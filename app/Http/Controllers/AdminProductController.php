<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\CategoryProduct;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use File;

class AdminProductController extends Controller
{
    //action hiển thị danh sách các sản phẩm
    function index(Request $request, $status = "")
    {
        //Lấy tất cả sản phẩm bao gồm cả những sản phẩm đã vô hiệu hóa
        $all_pro = Product::withTrashed();

        //Lấy tất cả sản phẩm đã vô hiệu hóa
        $pro_remove = Product::onlyTrashed();

        //Lấy tất cả sản phẩm đang hoạt động
        $pro_active = Product::all();

        //Lấy id và tên các danh mục sản phẩm
        $catName = CategoryProduct::getCatName();
        //đếm số lượng bản ghi các sản phẩm theo trạng thái 
        $count = array(
            "all_pro" => $all_pro->count(),
            "pro_remove" => $pro_remove->count(),
            "pro_active" => $pro_active->count(),
        );

        if ($status == "del") {
            $list_act = [
                'restore' => "Hiển thị",
                'delete' => "Xóa vĩnh viễn"
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $pro_remove->where('name', 'LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act", 'catName'));
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Ẩn sản phẩm",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = Product::where('name', 'LIKE', "%{$search}%")->paginate(10);
            // dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act", 'catName'));
        } else {
            if ($pro_remove->count() != 0) {
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
            $products = $all_pro->where('name', 'LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act", 'catName'));
        }
    }


    function create()
    {
        $cats = new CategoryProduct();
        $brands = Brand::all();
        $cat_list = $cats->getParent();
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

        Product::create([
            'product_code' => $request->input('product_code'),
            'name' => $request->input('name'),
            'description' => "'".$request->input('description')."'",
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'image' => $image,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ]);
        return redirect('admin/product/list')->with('success', 'Thêm sản phẩm mới thành công!');
    }

    //Xóa hoàn toàn một sản phẩm khỏi hệ thống
    function delete($id)
    {
        $pro = Product::onlyTrashed()->find($id);
        if ($pro != null) {
            $pro->forceDelete();
            return redirect('admin/product/list')->with('success', "Bạn đã xóa vĩnh viễn thành viên!");
        } else {
            return redirect('admin/product/list')->with('danger', "Không xóa được sản phẩm đó!");
        }
    }

    //Vô hiệu hóa một sản phẩm
    function remove($id)
    {
        $pro = Product::all()->find($id);
        if ($pro != null) {
            $pro->delete();
            return redirect('admin/product/list')->with('success', "Bạn đã vô hiệu hóa thành viên thành công!");
        } else {
            return redirect('admin/product/list')->with('danger', "Không thể vô hiệu hóa sản phẩm đó!");
        }
    }

    //Khôi phục một sản phẩm bị vô hiệu hóa
    function restore($id)
    {
        $pro = Product::onlyTrashed()->find($id);
        if ($pro != null) {
            $pro->restore();
            return redirect('admin/product/list')->with('success', "Khôi phục sản phẩm thành công!");
        } else {
            return redirect('admin/product/list')->with('danger', "Không thể khôi phục sản phẩm đó!");
        }
    }

    //Hành động áp dụng hàng loạt
    function action(Request $req){
        $listcheck = $req->input('list_check');

        if($listcheck != null){
            if(!empty($listcheck)){
                $act = $req->input('act');
                //Thực hiện hành động ẩn các sản phẩm có id trong list_check
                if($act == "remove"){
                    Product::destroy($listcheck);
                    return redirect('admin/product/list')->with('success', "Các tài khoản đã ẩn thành công!",);
                }
                //Thực hiện hành động khôi phục các tài khoản có id trong list_check
                if($act == 'restore'){
                    Product::onlyTrashed()
                    ->whereIn('id', $listcheck)
                    ->restore();
                    return redirect('admin/product/list')->with('success', "Các sản phẩm đã được hiển thị lại!");
                }
                //Thực hiện hành động xóa các sản phẩm có id trong list_check
                if($act == 'delete'){
                    Product::onlyTrashed()
                    ->whereIn('id', $listcheck)
                    ->forceDelete();
                    return redirect('admin/product/list')->with('success', "Các sản phẩm đã được xóa hoàn toàn!", 'alert', 'success');
                }
            }
        }
    }

    function edit($id){
        $cats = new CategoryProduct();
        $brands = Brand::all();
        $cat_list = $cats->getParent();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'cat_list', 'brands'));
    }

    function update(Request $request, $id)
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
        $product = Product::find($id);
        if (empty($request->file())) {
            $image = $product->image;
        } else {
            if(File::exists(public_path('images/'.$product->image))){
                File::delete(public_path('images/'.$product->image));
            }
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $image);
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'image' => $image,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ]);
        return redirect('admin/product/list')->with('success', 'Thêm sản phẩm mới thành công!');
    }

}
