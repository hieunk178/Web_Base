<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $data = Role::paginate(15);
        return view('admin.role.index', compact('data'));
    }

    public function create(){
        $route = '';
        return view('admin.role.create', compact('route'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name'=> 'required'
            ],
            [
                'name.required'=> "Tên nhóm quyền không được để trống"
            ]
        );
        $routes = json_encode($request->route);
        Role::create(
            ['name'=>$request->name],
            ['permissions'=> $routes],
        );
        return redirect('admin/role')->with('success', "Thêm nhóm quyền thành công!");
    }
}
