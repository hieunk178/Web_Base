<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'dashboard']);
            return $next($request);
        });
    }

    function show(){
        $projectPath = base_path();
        $totalSize = round($this->calculateFolderSize($projectPath)/1024/1024);
        $totalProduct = $this->totalProduct();
        $totalCategory = $this->totalCategory();
        return view('admin.dashboard', compact('totalSize', 'totalProduct', 'totalCategory'));
    }

    private function calculateFolderSize($path)
    {
        $totalSize = Cache::rememberForever('totalSize', function() use ($path) {
            $size = 0;
            foreach (File::allFiles($path) as $file) {
                $size += $file->getSize();
            }
            return $size;
        });
        return $totalSize;
    }
    private function totalProduct()
    {
        $totalProduct = Cache::rememberForever('totalProduct', function() {
            return Product::count();
        });
        return $totalProduct;
    }
    private function totalCategory()
    {
        $totalProduct = Cache::rememberForever('totalCategory', function() {
            return CategoryProduct::count();
        });
        return $totalProduct;
    }
}
