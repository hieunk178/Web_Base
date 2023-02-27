<?php

use App\Http\Controllers\Admin\AdminCategoryProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminFeedbackController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Nhóm route xử lý trên addmin
Route::middleware('auth')->group(function () {
    Route::group(['prefix'=>'admin','as'=>'admin'],function () {
        Route::get('/', [DashboardController::class, 'show'])->name('.dashboard');
        Route::get('dashboard', [DashboardController::class,'show'])->name('.dashboard');
        Route::group(['prefix'=>'role', 'as'=> '.role'],function () {
            Route::get('/', [RoleController::class, 'index'])->name('.index');
            Route::get('create', [RoleController::class, 'create'])->name('.create');
            Route::post('store', [RoleController::class, 'store'])->name('.store');
        });
        Route::get('brand/show', [AdminBrandController::class, 'index'])->name('.brand.index');
        Route::group(['prefix'=>'user', 'as'=> '.user'],function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('.index');
            Route::get('list', [AdminUserController::class, 'index'])->name('.index');
            Route::get('list/{status}', [AdminUserController::class, 'list'])->name('.status');
            Route::get('create', [AdminUserController::class, 'create'])->name('.create');
            Route::post('store', [AdminUserController::class, 'store'])->name('.store');
            Route::get('action', [AdminUserController::class, 'action'])->name('.action');
            Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('.edit');
            Route::post('update/{id}', [AdminUserController::class, 'update'])->name('.update');
            Route::get('remove/{id}', [AdminUserController::class, 'remove'])->name('.remove');
            Route::get('restore/{id}', [AdminUserController::class, 'restore'])->name('.restore');
            Route::get('delete/{id}', [AdminUserController::class, 'delete'])->name('.delete');
        });
        Route::group(['prefix'=>'product', 'as'=> '.product'],function () {
            //Các route categoryproductController
            Route::group(['prefix'=>'cat', 'as'=> '.cat'],function () {
                Route::get('/', [AdminCategoryProductController::class, 'index'])->name('.index');
                Route::get('list', [AdminCategoryProductController::class, 'index'])->name('.index');
                Route::get('list/{status}', [AdminCategoryProductController::class, 'index'])->name('.list.status');
                Route::get('create', [AdminCategoryProductController::class, 'create'])->name('.create');
                Route::post('store', [AdminCategoryProductController::class, 'store'])->name('.store');
                Route::get('remove/{id}', [AdminCategoryProductController::class, 'remove'])->name('.remove');
                Route::get('restore/{id}', [AdminCategoryProductController::class, 'restore'])->name('.restore');
                Route::get('delete/{id}', [AdminCategoryProductController::class, 'delete'])->name('.delete');
                Route::get('edit/{id}', [AdminCategoryProductController::class, 'edit'])->name('.edit');
                Route::post('update/{id}', [AdminCategoryProductController::class, 'update'])->name('.update');
            });
            Route::get('/', [AdminProductController::class, 'index'])->name('.index');
            Route::get('list', [AdminProductController::class, 'index'])->name('.index');
            Route::get('list/{status}', [AdminProductController::class, 'index'])->name('.list.status');
            Route::get('create', [AdminProductController::class, 'create'])->name('.create');
            Route::post('store', [AdminProductController::class, 'store'])->name('.store');
            Route::get('remove/{id}', [AdminProductController::class, 'remove'])->name('.remove');
            Route::get('restore/{id}', [AdminProductController::class, 'restore'])->name('.restore');
            Route::get('delete/{id}', [AdminProductController::class, 'delete'])->name('.delete');
            Route::get('action', [AdminProductController::class, 'action'])->name('.action');
            Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('.edit');
            Route::post('update/{id}', [AdminProductController::class, 'update'])->name('.update');
        });
        Route::group(['prefix'=>'brand', 'as'=> '.brand'],function () {
            Route::get('/', [AdminBrandController::class, 'index'])->name('.index');
            Route::get('list', [AdminBrandController::class, 'index'])->name('.index');
            Route::post('store', [AdminBrandController::class, 'store'])->name('.store');
            Route::get('edit', [AdminBrandController::class, 'edit'])->name('.edit');
            Route::get('delete/{id}', [AdminBrandController::class, 'delete'])->name('.delete');
        });
        Route::group(['prefix'=>'feedback', 'as'=> '.feedback'],function () {
            Route::get('/', [AdminFeedbackController::class, 'index'])->name('.index');
            Route::get('list', [AdminFeedbackController::class, 'index'])->name('.index');
        });
        Route::group(['prefix'=>'slider', 'as'=> '.slider'],function () {
            Route::get('', [AdminSliderController::class, 'index'])->name('.index');
            Route::get('show', [AdminSliderController::class, 'index'])->name('.index');
            Route::post('store', [AdminSliderController::class, 'store'])->name('.store');
            Route::get('remove/{id}', [AdminSliderController::class, 'remove'])->name('.remove');
            Route::get('delete/{id}', [AdminSliderController::class, 'delete'])->name('.delete');
            Route::get('restore/{id}', [AdminSliderController::class, 'restore'])->name('.restore');
        });
    });
    Route::redirect('/', 'admin');
});
