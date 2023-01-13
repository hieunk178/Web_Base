<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Repositories\CategoryProduct\CategoryRepositoryInterface;

class AdminCategoryProductController extends Controller
{
    private $categoryRepo;
    function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
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
            //dd($users->total()); 
            return view("admin.product.cat.list", compact("cats", 'catName', "count", "list_act"));
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Vô hiệu hóa",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $cats = $this->categoryRepo->getCategory('active', $search);
            // dd($users->total()); 
            return view("admin.product.cat.list", compact("cats", 'catName', "count", "list_act"));
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
            //dd($users->total()); 
            return view("admin.product.cat.list", compact("cats", 'catName', "count", "list_act"));
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
                'image' => 'mimes:jpg,png,gif|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif'
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
            $req->image->move(public_path("images"), $fileName);
            $image = $fileName;
        }
        CategoryProduct::create([
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'image' => $image,
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
                'image' => 'mimes:jpg,png,gif|max:20000',

            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif',
            ],
            [
                'name' => 'Tên người dùng',
                'image' => 'Ảnh minh họa',
            ],
        );
        if (empty($req->file())) {
            $image = CategoryProduct::find($id)->image;
        } else {
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path("images"), $fileName);
            $image = $fileName;
        }
        CategoryProduct::where('id', $id)->update([
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'image' => $image,
            'id_parent' => $req->input('id_parent'),
        ]);
        return redirect('admin/product/cat/list')->with('success', 'Cập nhật thành công danh mục!');
    }
}
