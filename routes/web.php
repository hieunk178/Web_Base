<?php

use App\Http\Controllers\Admin\AdminCategoryProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\RoleController;
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
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'show']);
        Route::get('dashboard', [DashboardController::class, 'show'])->name('admin.dashboard');
        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index']);
            Route::get('role', [RoleController::class, 'index'])->name('admin.role.index');
            Route::get('create', [RoleController::class, 'create'])->name('admin.role.create');
            Route::post('store', [RoleController::class, 'store'])->name('admin.role.store');
            Route::get('listRoute', [RoleController::class, 'listRoute'])->name('admin.role.listRoute');
        });
        Route::get('brand/show', [AdminBrandController::class, 'index'])->name('admin.brand.show');
        Route::prefix('user')->group(function () {
            Route::get('/', [AdminUserController::class, 'list']);
            Route::get('list', [AdminUserController::class, 'list'])->name('admin.user.list');
            Route::get('list/{status}', [AdminUserController::class, 'list'])->name('admin.user.status');
            Route::get('create', [AdminUserController::class, 'create'])->name('admin.user.create');
            Route::post('store', [AdminUserController::class, 'store'])->name('admin.user.store');
            Route::get('action', [AdminUserController::class, 'action'])->name('admin.user.action');
            Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
            Route::post('update/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');
            Route::get('remove/{id}', [AdminUserController::class, 'remove'])->name('admin.user.remove');
            Route::get('restore/{id}', [AdminUserController::class, 'restore'])->name('admin.user.restore');
            Route::get('delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
        });
        Route::prefix('product')->group(function () {
            //Các route categoryproductController
            Route::prefix('cat')->group(function () {
                Route::get('list', [AdminCategoryProductController::class, 'index'])->name('admin.product.cat.list');
                Route::get('/', [AdminCategoryProductController::class, 'index']);
                Route::get('list/{status}', [AdminCategoryProductController::class, 'index'])->name('admin.product.cat.list.status');
                Route::get('create', [AdminCategoryProductController::class, 'create'])->name('admin.product.cat.create');
                Route::post('store', [AdminCategoryProductController::class, 'store'])->name('admin.product.cat.store');
                Route::get('remove/{id}', [AdminCategoryProductController::class, 'remove'])->name('admin.product.cat.remove');
                Route::get('restore/{id}', [AdminCategoryProductController::class, 'restore'])->name('admin.product.cat.restore');
                Route::get('delete/{id}', [AdminCategoryProductController::class, 'delete'])->name('admin.product.cat.delete');
                Route::get('edit/{id}', [AdminCategoryProductController::class, 'edit'])->name('admin.product.cat.edit');
                Route::post('update/{id}', [AdminCategoryProductController::class, 'update'])->name('admin.product.cat.update');
            });
            Route::get('/', [AdminProductController::class, 'index'])->name('admin.product.list');
            Route::get('list', [AdminProductController::class, 'index'])->name('admin.product.list');
            Route::get('list/{status}', [AdminProductController::class, 'index'])->name('admin.product.list.status');
            Route::get('create', [AdminProductController::class, 'create'])->name('admin.product.create');
            Route::post('store', [AdminProductController::class, 'store'])->name('admin.product.store');

            Route::get('remove/{id}', [AdminProductController::class, 'remove'])->name('admin.product.remove');
            Route::get('restore/{id}', [AdminProductController::class, 'restore'])->name('admin.product.restore');
            Route::get('delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            Route::get('action', [AdminProductController::class, 'action'])->name('admin.product.action');
            Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('update/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
        });
        Route::prefix('brand')->group(function () {
            Route::get('brand', [AdminBrandController::class, 'index'])->name('admin.brand.show');
            Route::post('store', [AdminBrandController::class, 'store'])->name('admin.brand.store');
            Route::get('edit', [AdminBrandController::class, 'edit'])->name('admin.brand.edit');
            Route::get('delete/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');
        });
        Route::prefix('feeback')->group(function () {
            Route::get('/', [AdminFeedbackController::class, 'index']);
            Route::get('list', [AdminFeedbackController::class, 'index'])->name('admin.feedback.list');
        });
    });
    Route::get('/', function () {
        return view('admin.dashboard');
    });
});
