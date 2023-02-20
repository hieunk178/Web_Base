<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Brand\BrandRepositoryInterface;

class AdminBrandController extends Controller
{
    //
    protected $BrandRepo;
    function __construct(BrandRepositoryInterface $BrandRepo)
    {
        $this->BrandRepo = $BrandRepo;
        $this->middleware(function($request, $next){
            session(['module_active' => 'brand']);
            return $next($request);
        });
    }
    function index(){
        $brands = $this->BrandRepo->getAll();
        return view('admin.brand.show',compact('brands'));
    }

    function store(Request $req){
        $id = $req->input('update');
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
            $brand = 
            [
                'name' => $req->input('name'),
                'description' => $req->input('description')
            ];
            if(empty($id)){
                if(empty($req->file())){
                    $brand['image']='image_blank.jpg';
                }else{
                    $fileName = time().'.'.$req->image->extension();  
                    $req->image->move(public_path("images"), $fileName);
                    $brand['image'] = $fileName;
                }
                $this->BrandRepo->createBrand($brand);
                return redirect('admin/brand/show')->with('success', 'Đã thêm một thương hiệu mới!');
            }else{
                if(!empty($req->file())){
                    $br = $this->BrandRepo->find($id);
                    if(File::exists(public_path('images/'.$br->image))){
                        File::delete(public_path('images/'.$br->image));
                    }
                    $fileName = time().'.'.$req->image->extension();  
                    $req->image->move(public_path("images"), $fileName);
                    $brand['image'] = $fileName;
                }
                $this->BrandRepo->updateBrand($id,$brand);
                return redirect('admin/brand/show')->with('success', 'Đã chỉnh sửa thương hiệu thành công!');
            }
        }else{
            return redirect('admin/brand/show')->with('danger', 'Thương hiệu đã tồn tại(trùng khóa)!');
        }
    }

    function delete($id){
        $brand = $this->BrandRepo->find($id);
        if($brand){
            $brand->delete();
            return redirect('admin/brand/show')->with('success', 'Đã xóa thương hiệu thành công!');
        }else{
            return redirect('admin/brand/show')->with('danger', 'Không thể xóa thương hiệu không tồn tại!');
        }
    }
}
