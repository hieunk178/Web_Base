<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('home', [ApiController::class, 'index'])->name('api.home');
Route::get('product/{id}', [ApiController::class, 'productDetail'])->name('api.product.detail');
Route::get('product/same_category/{cat_id}', [ApiController::class, 'sameCategory'])->name('api.product.same_category');
Route::get('cat_menu', [ApiController::class, 'getCatMenu'])->name('api.getCatMenu');
Route::get('product', [ApiController::class, 'productAll'])->name('api.product.productAll');

