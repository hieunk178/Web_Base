<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use File;

class AdminProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    //action hiển thị danh sách các sản phẩm
    function index(Request $request, $status = "")
    {
        //đếm số lượng bản ghi các sản phẩm theo trạng thái
        // dd($this->productRepository->count()); 
        $count = $this->productRepository->count();
        if ($status == "del") {
            $list_act = [
                'restore' => "Hiển thị",
                'delete' => "Xóa vĩnh viễn"
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $this->productRepository->getProduct("remove", $search);
            //dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act"));
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Ẩn sản phẩm",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $this->productRepository->getProduct("active", $search);
            // dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act"));
        } else {
            if ($count['pro_remove'] != 0) {
                $list_act = [
                    'restore' => "Hiển thị",
                    'remove' => "Ẩn sản phẩm",
                    'delete' => "Xóa vĩnh viễn"
                ];
            } else {
                $list_act = [
                    'remove' => "Ẩn sản phẩm",
                ];
            }
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $this->productRepository->getProduct("", $search);
            return view("admin.product.list", compact("products", "count", "list_act"));
        }
    }


    function create()
    {
        $cat_list = $this->productRepository->getCatProductName();
        $brands = $this->productRepository->getBrandName();
        // dd($brands);
        return view('admin.product.create', compact('cat_list', 'brands'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'new_price' => 'integer',
                'quantity' => 'required|integer',
                'image' => 'mimes:jpg,png,gif|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có đỗ dài lớn nhất là :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif',
                'integer' => ':attribute phải là số nguyên!',
            ],
            [
                'name' => 'Tên người dùng',
                'price' => 'Giá sản phẩm',
                'new_price' => 'Giá khuyến mại',
                'quantity' => 'Số lượng',
                'image' => 'Hình ảnh'
            ],

        );
        if (empty($request->file())) {
            $image = 'image_blank.jpg';
        } else {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $image);
        }
        $product = [
            'product_code' => $request->input('product_code'),
            'name' => $request->input('name'),
            'description' => "'" . $request->input('description') . "'",
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'image' => $image,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ];
        $this->productRepository->createProduct($product);
        return redirect('admin/product/list')->with('success', 'Thêm sản phẩm mới thành công!');
    }

    //Xóa hoàn toàn một sản phẩm khỏi hệ thống
    function delete($id)
    {
        if ($this->productRepository->deleteProduct($id)) {
            return redirect('admin/product/list')->with('success', "Xóa hoàn toàn sản phẩm thành công!");
        } else {
            return redirect('admin/product/list')->with('danger', "Xóa hoàn toàn sản phẩm không thành công!");
        }
    }

    //Vô hiệu hóa một sản phẩm
    function remove($id)
    {
        if ($this->productRepository->removeProduct($id)) {
            return redirect('admin/product/list')->with('success', "Vô hiệu hóa sản phẩm thành công!");
        } else {
            return redirect('admin/product/list')->with('danger', "Vô hiệu hóa sản phẩm không thành công!");
        }
    }

    //Khôi phục một sản phẩm bị vô hiệu hóa
    function restore($id)
    {
        if ($this->productRepository->restoreProduct($id)) {
            return redirect('admin/product/list')->with('success', "Khôi phục sản phẩm thành công!");
        } else {
            return redirect('admin/product/list')->with('danger', "Khôi phục sản phẩm không thành công!");
        }
    }

    //Hành động áp dụng hàng loạt
    function action(Request $req)
    {
        $listcheck = $req->input('list_check');

        if ($listcheck != null) {
            if (!empty($listcheck)) {
                $act = $req->input('act');
                //Thực hiện hành động ẩn các sản phẩm có id trong list_check
                if ($act == "remove") {
                    Product::destroy($listcheck);
                    return redirect('admin/product/list')->with('success', "Các tài khoản đã ẩn thành công!",);
                }
                //Thực hiện hành động khôi phục các tài khoản có id trong list_check
                if ($act == 'restore') {
                    Product::onlyTrashed()
                        ->whereIn('id', $listcheck)
                        ->restore();
                    return redirect('admin/product/list')->with('success', "Các sản phẩm đã được hiển thị lại!");
                }
                //Thực hiện hành động xóa các sản phẩm có id trong list_check
                if ($act == 'delete') {
                    Product::onlyTrashed()
                        ->whereIn('id', $listcheck)
                        ->forceDelete();
                    return redirect('admin/product/list')->with('success', "Các sản phẩm đã được xóa hoàn toàn!", 'alert', 'success');
                }
            }
        }
    }
    function edit($id)
    {
        $cat_list = $this->productRepository->getCatProductName();
        $brands = $this->productRepository->getBrandName();
        $product = $this->productRepository->find($id);
        return view('admin.product.edit', compact('product', 'cat_list', 'brands'));
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | string | max:255',
                'price' => 'required | integer',
                'new_price' => 'integer',
                'quantity' => 'required|integer',
                'image' => 'mimes:jpg,png,gif|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có đỗ dài lớn nhất là :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif',
                'integer' => ':attribute phải là số nguyên!',
            ],
            [
                'name' => 'Tên người dùng',
                'price' => 'Giá sản phẩm',
                'new_price' => 'Giá khuyến mại',
                'quantity' => 'Số lượng',
                'image' => 'Hình ảnh'
            ],
        );
        $product = $this->productRepository->find($id);
        if (empty($request->file())) {
            $image = $product->image;
        } else {
            if (File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $image);
        }

        $productUpdate = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'image' => $image,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ];
        $this->productRepository->updateProduct($id, $productUpdate);
        return redirect('admin/product/list')->with('success', 'Thêm sản phẩm mới thành công!');
    }
}
