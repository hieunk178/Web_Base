<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CategoryProduct\CategoryRepositoryInterface;
use Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class AdminCategoryProductController extends Controller
{
    private $categoryRepo;
    function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'category']);
            return $next($request);
        });
    }
    //action hiển thị danh sách các danh mục sản phẩm
    function index(Request $request, $status = "")
    {
        $data = new CategoryProduct();
        $catName = $data->getCatName();
        //đếm số lượng bản ghi các danh mục
        $count = $this->categoryRepo->count();
        if ($status == "del") {
            $list_act = [
                'restore' => "Khôi phục",
                'delete' => "Xóa vĩnh viễn"
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $cats = $this->categoryRepo->getCategory('remove', $search);
            return view("admin.product.cat.index", compact("cats", 'catName', "count", "list_act"));
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Vô hiệu hóa",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $cats = $this->categoryRepo->getCategory('active', $search);
            return view("admin.product.cat.index", compact("cats", 'catName', "count", "list_act"));
        } else {
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            if ($this->categoryRepo->getCategory('remove', $search)->count() != 0) {
                $list_act = [
                    'restore' => "Khôi phục",
                    'remove' => "Vô hiệu hóa",
                    'delete' => "Xóa vĩnh viễn"
                ];
            } else {
                $list_act = [
                    'remove' => "Vô hiệu hóa",
                ];
            }
            $cats = $this->categoryRepo->getCategory('', $search);
            return view("admin.product.cat.index", compact("cats", 'catName', "count", "list_act"));
        }
    }

    function create()
    {
        $cat = new CategoryProduct();
        $cat_level = $cat->getParent();
        return view('admin.product.cat.create', compact('cat_level'));
    }
    function store(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|string|max:255',
                'image' => 'mimes:jpg,png,gif,webp|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg,png,gif,webp'
            ],
            [
                'name' => 'Tên người dùng',
                'image' => 'Ảnh minh họa',
            ],
        );
        if (empty($req->file())) {
            $image = 'image_blank.jpg';
        } else {
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path("uploads"), $fileName);
            $image = $fileName;
        }
        $pathImage = "/uploads/" . $image;
        CategoryProduct::create([
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'image' => $pathImage,
            'id_parent' => $req->input('id_parent'),
        ]);
        return redirect('admin/product/cat/list')->with('success', 'Đã thêm một danh mục sản phẩm mới!');
    }

    function edit($id)
    {
        $cats = new CategoryProduct();
        $cat = $cats->find($id);
        $cat_level = $cats->getParent();
        return view('admin.product.cat.edit', compact('cat_level', 'cat'));
    }

    function update(Request $req, $id)
    {
        $req->validate(
            [
                'name' => 'required|string|max:255',
                'image' => 'mimes:jpg,png,gif,webp|max:20000',

            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg,png,gif,webp',
            ],
            [
                'name' => 'Tên người dùng',
                'image' => 'Ảnh minh họa',
            ],
        );
        if (empty($req->file())) {
            $pathImage = CategoryProduct::find($id)->image;
        } else {
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path("uploads"), $fileName);
            $image = $fileName;
            $pathImage = "/uploads/" . $image;
        }
        CategoryProduct::where('id', $id)->update([
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'image' => $pathImage,
            'id_parent' => $req->input('id_parent'),
        ]);
        return redirect('admin/product/cat/list')->with('success', 'Cập nhật thành công danh mục!');
    }

    public function remove($id)
    {
        if ($this->categoryRepo->removeCategory($id)) {
            return redirect()->route('admin.product.cat.index')->with('success', 'Ẩn thành công danh mục!');
        } else {
            return redirect()->route('admin.product.cat.index')->with('success', 'Ẩn danh mục không thành công!');
        }
    }
    public function restore($id)
    {
        if ($this->categoryRepo->restoreCategory($id)) {
            return redirect()->route('admin.product.cat.index')->with('success', 'Hiển thị thành công danh mục!');
        } else {
            return redirect()->route('admin.product.cat.index')->with('success', 'Hiển thị danh mục không thành công!');
        }
    }
    public function delete($id)
    {
        if ($this->categoryRepo->deleteCategory($id)) {
            return redirect()->route('admin.product.cat.index')->with('success', 'Xóa thành công danh mục!');
        } else {
            return redirect()->route('admin.product.cat.index')->with('success', 'Xóa danh mục không thành công!');
        }
    }

    function action(Request $req)
    {
        $listcheck = $req->input('list_check');

        if ($listcheck != null) {
            if (!empty($listcheck)) {
                $act = $req->input('act');
                //Thực hiện hành động ẩn các danh mục sản phẩm có id trong list_check
                if ($act == "remove") {
                    CategoryProduct::destroy($listcheck);
                    return redirect('admin/product/cat/list')->with('success', "Bạn đã vô hiệu hóa thành công!");
                }
                //Thực hiện hành động khôi phục các tài khoản có id trong list_check
                if ($act == 'restore') {
                    CategoryProduct::onlyTrashed()
                        ->whereIn('id', $listcheck)
                        ->restore();
                    return redirect('admin/product/cat/list')->with('success', "Các danh mục sản phẩm đã được hiển thị lại!");
                }
                //Thực hiện hành động xóa các danh mục sản phẩm có id trong list_check
                if ($act == 'delete') {
                    try {
                        CategoryProduct::onlyTrashed()
                            ->whereIn('id', $listcheck)
                            ->forceDelete();
                        return redirect('admin/product/cat/list')->with('success', "Các danh mục sản phẩm đã được xóa hoàn toàn!");
                    } catch (Exception $e) {
                        return redirect('admin/product/cat/list')->with('danger', "Vui lòng xóa hết sản phẩm trong danh mục trước khi xóa danh mục!");
                    }
                }
            }
        }

        return redirect('admin/product/cat/list')->with('success', "Vui lòng chọn hoạt động!");
    }
}
