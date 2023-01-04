<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class AdminBrandController extends Controller
{
    //
    
    function index(){
        $brands = Brand::paginate();
        return view('admin.brand.show',compact('brands'));
    }

    function store(Request $req){
        if($req->input('create') == null){
            $req->validate(
                [
                    'name'=> 'required|string|max:255',
                    'image' => 'mimes:jpg,png,gif|max:20000',
                ],
                [
                    'required'=> ':attribute không được bỏ trống!',
                    'max'=> ':attribute có độ dài lớn nhất :max ký tự!',
                    'mimes'=> ':attribute chỉ được dùng file jpg, png, gif'
                ],
                [
                    'name'=>'Tên thương hiệu',
                    'image'=>'Ảnh minh họa',
                ],
            );
            $brand = Brand::find($req->input('update'));
            if(empty($req->file())){
                if(empty($req->input('update')))
                    $image = 'image_blank.jpg';
                else{
                    $image = $brand->image;
                }
            }
            if(!empty($req->file())){
                $fileName = time().'.'.$req->image->extension();  
                $req->image->move(public_path("images"), $fileName);
                $image = $fileName;
            }
            if(empty($req->input('update'))){
                Brand::create([
                    'name' => $req->input('name'),
                    'description' => $req->input('description'),
                    'image' => $image
                ]);
                return redirect('admin/brand/show')->with('success', 'Đã thêm một thương hiệu mới!');
    
            }else{
                $brand->update([
                    'name' => $req->input('name'),
                    'description' => $req->input('description'),
                    'image' => $image
                ]);
                return redirect('admin/brand/show')->with('success', 'Đã chỉnh sửa thành công thương hiệu!');
            }
        }else{
            return redirect('admin/brand/show')->with('danger', 'Thương hiệu đã tồn tại(trùng khóa)!');
        }
        
    }

    public function edit(Request $request)
    {
        $brand = Brand::find($request->id);
        echo json_encode($brand);
        exit;
    }
}
