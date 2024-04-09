<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Services\Brand\BrandServiceInterface;

class AdminBrandController extends Controller
{
    //
    protected $brandRepository;
    protected $brandServiceInterface;
    function __construct(
        BrandRepositoryInterface $brandRepository,
        BrandServiceInterface $brandServiceInterface
    ) {
        $this->brandRepository = $brandRepository;
        $this->brandServiceInterface = $brandServiceInterface;
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'brand']);
            return $next($request);
        });
    }

    function index()
    {
        $brands = $this->brandServiceInterface->index();
        return view('admin.brand.show', $brands);
    }

    function store(Request $req)
    {
        $data = $this->brandServiceInterface->store($req);
        return redirect('admin/brand/show')->with($data);
    }

    function delete($id)
    {
        $data = $this->brandServiceInterface->delete($id);
        return redirect('admin/brand/show')->with($data);
    }

    function edit($id)
    {
        $data = $this->brandServiceInterface->edit($id);
        return view('admin.brand.edit', $data);
    }

    function update(Request $req, $id)
    {
        $data = $this->brandServiceInterface->update($req, $id);
        return redirect('admin/brand/show')->with($data);
    }
}
