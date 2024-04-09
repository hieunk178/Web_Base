<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\ExcelSetting;
use App\Models\Product;
use App\Models\ProductImport as ModelsProductImport;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductController extends Controller
{
    protected $productServiceI;
    public function __construct(ProductServiceInterface $productServiceI)
    {
        $this->productServiceI = $productServiceI;
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }

    //action hiển thị danh sách các sản phẩm
    function index(Request $request, $status = "")
    {
        $data = $this->productServiceI->index($request, $status);
        return view("admin.product.list", $data);
    }

    //Tạo sản phẩm
    function create()
    {
        $data = $this->productServiceI->create();
        return view('admin.product.create', $data);
    }

    function store(Request $request)
    {
        $data = $this->productServiceI->store($request);
        return redirect('admin/product/list')->with($data);
    }

    //Xóa hoàn toàn một sản phẩm khỏi hệ thống
    function delete($id)
    {
        $data = $this->productServiceI->delete($id);
        return redirect('admin/product/list')->with($data);
    }

    function remove($id)
    {
        $data = $this->productServiceI->remove($id);
        return redirect('admin/product/list')->with($data);
    }

    //Khôi phục một sản phẩm bị vô hiệu hóa
    function restore($id)
    {
        $data = $this->productServiceI->restore($id);
        return redirect('admin/product/list')->with($data);
    }

    //Hành động áp dụng hàng loạt
    function action(Request $req)
    {
        $data = $this->productServiceI->action($req);
        return redirect('admin/product/list')->with($data);
    }

    //Sửa sản phẩm
    function edit($id)
    {
        $data = $this->productServiceI->edit($id);
        return view('admin.product.edit', $data);
    }

    function update(Request $request, $id)
    {
        $data = $this->productServiceI->update($request, $id);
        return redirect('admin/product/list')->with($data);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required:mimes:xlsx,xls,csv',
        ]);
        $file = $request->file('file');
        Excel::import(new ProductImport, $file, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
}
