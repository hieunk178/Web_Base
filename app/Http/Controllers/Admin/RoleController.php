<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function  __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'role']);
            return $next($request);
        });
    }

    public function index()
    {
        $data = Roles::paginate(15);
        return view('admin.role.index', compact('data'));
    }

    public function create()
    {
        $routes = $this->listRoute();
        return view('admin.role.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => "Tên nhóm quyền không được để trống"
            ]
        );
        $routes = json_encode($request->route);
        Roles::create(
            ['name' => $request->name,
            'permissions' => $routes
            ]
        );
        return redirect('admin/role')->with('success', "Thêm nhóm quyền thành công!");
    }
    private function listRoute()
    {
        $routeCollection = Route::getRoutes();
        $routeNames = [];

        foreach ($routeCollection as $route){
            $name = $route->getName();
            if(!in_array($name, $routeNames) && strpos($name,'admin') !== false)
                array_push($routeNames,$name);
        }
        return $routeNames;
    }

    public function edit($id)
    {
        $role = Roles::find($id);
        $routes = json_decode($role->permissions);
        $allRoute = $this->listRoute();
        return view('admin.role.edit', compact('role', 'routes', 'allRoute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => "Tên nhóm quyền không được để trống"
            ]
        );
        $routes = json_encode($request->route);
        Roles::where('id', $id)->update(
            ['name' => $request->name,
            'permissions' => $routes
            ]
        );
        return redirect('admin/role')->with('success', "Cập nhật nhóm quyền thành công!");
    }
}
