<?php

use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FileController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Nhóm route xử lý trên addmin
Route::middleware('auth')->group(function(){

    //Các route của amdin role(phân quyền)
    Route::get('/admin/role', [RoleController::class, 'index']);
    Route::get('/admin/role/create', [RoleController::class, 'create']);
    Route::post('/admin/role/store', [RoleController::class, 'store'])->name('admin.role.store');

    //Các route của amdin post(bài viết)
    Route::get('/admin/brand/show',[AdminBrandController::class, 'index'])->name('admin.brand.show');

    Route::get('/admin/dashboard', [DashboardController::class, 'show'])->name('admin.dashboard');
    Route::get('/admin', [DashboardController::class, 'show']);
    
    //Các route hiển thị danh sách user
    Route::get('/admin/user/list', [AdminUserController::class, 'list'])->name('list_user');
    Route::get('/admin/user/list/{status}', [AdminUserController::class, 'list'])->name('list_user_status');
    Route::get('/admin/user', [AdminUserController::class,'list'])->name('user.list');
    
    //Các route thực hiện các nhiệm vụ thêm, sửa, xóa, vô hiệu hóa, khôi phục user
    Route::get('/admin/user/create', [AdminUserController::class,'create']);
    Route::post('/admin/user/store', [AdminUserController::class,'store']);
    Route::get('/admin/user/remove/{id}', [AdminUserController::class,'remove'])->name('remove_user');
    Route::get('/admin/user/restore/{id}', [AdminUserController::class,'restore'])->name('restore_user');
    Route::get('/admin/user/delete/{id}', [AdminUserController::class,'delete'])->name('delete_user');
    Route::get('/admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/user/update/{id}', [AdminUserController::class, 'update'])->name('user.update');

    //Route thực hiện các nhiệm vụ trên nhiều bản ghi
    Route::get('/admin/user/action', [AdminUserController::class,'action']);

    //Các route của amdin product 
    Route::get('/admin/product/list',[AdminProductController::class, 'index'])->name('admin.product.list');

    //Các route categoryproductController
    Route::get('/admin/product/cat/list',[AdminCategoryProductController::class, 'index'])->name('admin.product.cat.list');
    Route::get('/admin/product/cat/list/{status}', [AdminCategoryProductController::class, 'index'])->name('admin.product.cat.list.status');
    Route::get('/admin/product/cat', [AdminCategoryProductController::class,'index'])->name('user.list');
    Route::get('/admin/product/cat/create',[AdminCategoryProductController::class, 'create'])->name('admin.product.cat.create');
    Route::post('/admin/product/cat/store',[AdminCategoryProductController::class, 'store'])->name('admin.product.cat.store');
    Route::get('/admin/product/cat/remove/{id}', [AdminCategoryProductController::class,'remove'])->name('admin.product.cat.remove');
    Route::get('/admin/product/cat/restore/{id}', [AdminCategoryProductController::class,'restore'])->name('admin.product.cat.restore');
    Route::get('/admin/product/cat/delete/{id}', [AdminCategoryProductController::class,'delete'])->name('admin.product.cat.delete');
    Route::get('/admin/product/cat/edit/{id}', [AdminCategoryProductController::class, 'edit'])->name('admin.product.cat.edit');
    Route::post('/admin/product/cat/update/{id}', [AdminCategoryProductController::class, 'update'])->name('admin.product.cat.update');
    
    //Các route của amdin brand(thương hiệu)
    Route::get('/admin/brand',[AdminBrandController::class, 'index'])->name('admin.brand.show');
    Route::post('/admin/brand/store',[AdminBrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit',[AdminBrandController::class, 'edit'])->name('admin.brand.edit');

    //Các route của amdin product (sản phẩm)
    Route::get('/admin/product/list',[AdminProductController::class, 'index'])->name('admin.product.list');
    Route::get('/admin/product/list/{status}',[AdminProductController::class, 'index'])->name('admin.product.list.status');
    Route::get('/admin/product/create',[AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/store',[AdminProductController::class, 'store'])->name('admin.product.store');

    Route::get('/admin/product/remove/{id}',[AdminProductController::class, 'remove'])->name('admin.product.remove');
    Route::get('/admin/product/restore/{id}',[AdminProductController::class, 'restore'])->name('admin.product.restore');
    Route::get('/admin/product/delete/{id}',[AdminProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('/admin/product/action',[AdminProductController::class, 'action'])->name('admin.product.action');
    Route::get('/admin/product/edit/{id}',[AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/update/{id}',[AdminProductController::class, 'update'])->name('admin.product.update');
});
