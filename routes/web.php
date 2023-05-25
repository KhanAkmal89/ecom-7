<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index']);
Route::post('/add/to/cart/{id}', [CartController::class, 'addToCart']);
Route::get('/remove/cart/product/{id}', [CartController::class, 'removeCartProduct']);


Route::get('/admin/login',[AdminController::class, 'adminLoginForm']);
Route::post('/admin/login',[AdminController::class, 'adminLogin']);
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard',[AdminController::class, 'adminaDashboard']);
    Route::get('/admin/logout',[AdminController::class, 'adminLogout']);

    //Categories route
    Route::get('category/add', [CategoryController::class, 'addCategory']);
    Route::get('category/manage', [CategoryController::class, 'manageCategory']);
    Route::post('category/store', [CategoryController::class, 'storeCategory']);
    Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);
    Route::post('category/update/{id}', [CategoryController::class, 'updateCategory']);
    Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory']);


    //Brands route
    Route::get('brand/add', [BrandController::class, 'addBrand']);
    Route::get('brand/manage', [BrandController::class, 'manageBrand']);
    Route::post('brand/store', [BrandController::class, 'storeBrand']);
    Route::get('brand/edit/{id}', [BrandController::class, 'editBrand']);
    Route::post('brand/update/{id}', [BrandController::class, 'updateBrand']);
    Route::get('brand/delete/{id}', [BrandController::class, 'deleteBrand']);

    //Products route
    Route::get('product/add', [ProductController::class, 'addProduct']);
    Route::get('product/manage', [ProductController::class, 'manageProduct']);
    Route::post('product/store', [ProductController::class, 'storeProduct']);
    Route::get('product/edit/{id}', [ProductController::class, 'editProduct']);
    Route::post('product/update/{id}', [ProductController::class, 'updateProduct']);
    Route::get('product/delete/{id}', [ProductController::class, 'deleteProduct']);


});
