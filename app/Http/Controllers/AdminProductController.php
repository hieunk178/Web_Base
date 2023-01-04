<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    //action hiển thị danh sách các sản phẩm
    function index(Request $request, $status=""){
        //Lấy tất cả sản phẩm bao gồm cả những sản phẩm đã vô hiệu hóa
        $all_pro = Product::withTrashed();

        //Lấy tất cả sản phẩm đã vô hiệu hóa
        $pro_remove = Product::onlyTrashed();

        //Lấy tất cả sản phẩm đang hoạt động
        $pro_active = Product::all();

        //đếm số lượng bản ghi các sản phẩm theo trạng thái 
        $count = array(
            "all_cat" => $all_pro->count(),
            "pro_remove" => $pro_remove->count(),
            "pro_active" => $pro_active->count(),
        );
        
        if($status == "del"){
            $list_act = [
                'restore'=>"Khôi phục",
                'delete'=>"Xóa vĩnh viễn"
            ];
            $search = "";
            if($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $pro_remove->where('name','LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act"));
        }else if($status == "active"){
            $list_act = [
                'remove'=>"Vô hiệu hóa",
            ];
            $search = "";
            if($request->input('keyword'))
                $search = $request->input('keyword');
            $products = Product::where('name','LIKE', "%{$search}%")->paginate(10);
            // dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act"));
        }else{
            if($pro_remove->count() != 0){
                $list_act = [
                    'restore'=>"Khôi phục",
                    'remove'=>"Vô hiệu hóa",
                    'delete'=>"Xóa vĩnh viễn"
                ];
            }else{
                $list_act = [
                    'remove'=>"Vô hiệu hóa",
                ];
            }
            $search = "";
            if($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $all_pro->where('name','LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.product.list", compact("products", "count", "list_act"));
        }
    }


    function create(){
        $cats = new CategoryProduct();
        $brands = Brand::all();
        $cat_list = $cats->getParent();
        return view('admin.product.create', compact('cat_list', 'brands'));
    }
}
