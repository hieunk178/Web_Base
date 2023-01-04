<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'user']);
            return $next($request);
        });
    }

    function list(Request $request, $status=""){
        $all_user = User::withTrashed();
        $user_remove = User::onlyTrashed();
        $user_active = User::all();
        $count = array(
            "all_user" => $all_user->count(),
            "user_del" => $user_remove->count(),
            "user_active" => $user_active->count(),
        );
        if($status == "del"){
            $list_act = [
                'restore'=>"Khôi phục",
                'delete'=>"Xóa vĩnh viễn"
            ];
            $search = "";
            if($request->input('keyword'))
                $search = $request->input('keyword');
            $users = $user_remove->where('name','LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.user.list", compact("users", "count", "list_act"));
        }else if($status == "active"){
            $list_act = [
                'remove'=>"Vô hiệu hóa",
            ];
            $search = "";
            if($request->input('keyword'))
                $search = $request->input('keyword');
            $users = User::where('name','LIKE', "%{$search}%")->paginate(10);
            // dd($users->total()); 
            return view("admin.user.list", compact("users", "count", "list_act"));
        }else{
            if($user_remove->count() != 0){
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
            $users = $all_user->where('name','LIKE', "%{$search}%")->paginate(10);
            //dd($users->total()); 
            return view("admin.user.list", compact("users", "count", "list_act"));
        }
    }

    function create(){
        return view('admin.user.create');
    }

    function store(Request $req){
        $req->validate(
            [
                'name'=> 'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:users',
                'password'=> 'required|string|min:8|confirmed',
                'avatar' => 'mimes:jpg,png,gif|max:20000',
            ],
            [
                'required'=> ':attribute không được bỏ trống!',
                'min'=> ':attribute có độ dài ít nhất :min ký tự!',
                'max'=> ':attribute có độ dài lớn nhất :max ký tự!',
                'confirmed'=> 'Xác nhận mật khẩu không thành công!',
                'unique'=> ':attribute đã được sử dụng',
                'mimes'=> ':attribute phải có định dạng jpg, png, gif!',
            ],
            [
                'name'=>'Tên người dùng',
                'email'=>'Email',
                'password'=>'Mật khẩu',
                'avatar'=>'Ảnh đại diện',
            ],
        );
        if(empty($req->file())){
            $avatar = 'user-blank.png';
        }else{
            $fileName = time().'.'.$req->avatar->extension();  
            $req->avatar->move(public_path("images"), $fileName);
            $avatar = $fileName;
        }
        User::create([
            'name' =>$req->input('name'),
            'email' =>$req->input('email'),
            'gender' =>$req->input('gender'),
            'phone' =>$req->input('phone'),
            'password' => Hash::make($req->input('password')),
            'avatar' =>$avatar,
        ]);
        return redirect('admin/user/list')->with('success', 'Đã thêm một người dùng mới!', 'alert', 'success');
    }

    //Xóa hoàn toàn một user khỏi hệ thống
    function delete($id){
        if(Auth::id() != $id){
            $user = User::withTrashed()->where('id', $id);
            $user->forceDelete();
            return redirect('admin/user/list')->with('success', "Bạn đã xóa vĩnh viễn thành viên!", 'alert', 'success');
        }else{
            return redirect('admin/user/list')->with('danger', "Bạn không thêt xóa chính mình!", 'alert', 'danger');
        }
    }

    //Vô hiệu hóa một user
    function remove($id){
        if(Auth::id() != $id){
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('success', "Bạn đã vô hiệu hóa thành viên thành công!", 'alert', 'success');
        }else{
            return redirect('admin/user/list')->with('danger', "Bạn không thể tự vô hiệu hóa chính mình khỏi hệ thống!");
        }
    }

    //Khôi phục một user bị vô hiệu hóa
    function restore($id){
        if(Auth::id() != $id){
            $user = User::withTrashed()->where('id', $id);
            $user->restore();
            return redirect('admin/user/list')->with('success', "Bạn đã khôi phục thành viên thành công!", 'alert', 'success');
        }else{
            return redirect('admin/user/list')->with('danger', "Bạn không thể khôi phục tài khoản này!", 'alert', 'success');
        }
    }

    //Hành động áp dụng hàng loạt
    function action(Request $req){
        $listcheck = $req->input('list_check');

        if($listcheck){
            //Loại bỏ thao tác lên chính tài khoản của mình
            foreach($listcheck as $k => $id){
                if(Auth::id() == $id){
                    unset($listcheck[$k]);
                }
            }
            if(!empty($listcheck)){

                $act = $req->input('act');
                //Thực hiện hành động vô hiệu hoa các tài khoản có id trong list_check
                if($act == "remove"){
                    User::destroy($listcheck);
                    return redirect('admin/user/list')->with('success', "Bạn đã vô hiệu hóa thành công!",);
                }
                //Thực hiện hành động khôi phục các tài khoản có id trong list_check
                if($act == 'restore'){
                    User::withTrashed()
                    ->whereIn('id', $listcheck)
                    ->restore();
                    return redirect('admin/user/list')->with('success', "Bạn đã khôi phục thành công!");
                }
                if($act == 'delete'){
                    User::withTrashed()
                    ->whereIn('id', $listcheck)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('success', "Bạn đã xóa vĩnh viễn thành viên!", 'alert', 'success');
                }
            }
        }
    }

    function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    function update(Request $req,$id){
        $req->validate(
            [
                'name'=> 'required|string|max:255',
                'phone'=> 'required|string|digits:10',
                'avatar' => 'mimes:jpg,png,gif|max:20000',
            ],
            [
                'required'=> ':attribute không được bỏ trống!',
                'digits'=> ':attribute phải có độ dài 10!',
                'mimes'=> ':attribute phải có định dạng jpg, png, gif!',
            ],
            [
                'name'=>'Tên người dùng',
                'phone'=>'Số điện thoại',
                'avatar'=>'Ảnh đại diện',
            ],
        );
        if(empty($req->file())){
            $avatar = User::find($id)->avatar;
        }else{
            $fileName = time().'.'.$req->avatar->extension();  
            $req->avatar->move(public_path("images"), $fileName);
            $avatar = $fileName;
        }
        User::where('id', $id)->update([
            'name' =>$req->input('name'),
            'phone' =>$req->input('phone'),
            'gender' =>$req->input('gender'),
            'avatar' =>$avatar,
        ]);
        
        return redirect('admin/user/list')->with('success', "Đã cập nhật thành công!");
    }

}