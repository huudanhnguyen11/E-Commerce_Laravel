<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderdetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductByCateController;

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
Route::get('/', function () {
    return view('welcome');
});
// home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// danh muc
Route::get('/test', [OrderdetailController::class, 'test']);
Route::get('/home/product/{id}', [ProductByCateController::class, 'getProductByCate'])->name('home.product.getproductbycate');
// chi tiet san pham
Route::get('/home/productdetail/{id}', [ProductByCateController::class, 'getProduct'])->name('home.productdetail');
// Cart
Route::get('/home/cart',[CartController::class,'Cart'])->name('home.cart');
Route::get('/home/cart/{id}',[CartController::class,'addCart'])->name('home.cart.addcart');
Route::get('/home/cart/quantity/{id}&{type}&{quantity}',[CartController::class,'updateCart'])->name('home.cart.updatecart');
Route::get('/home/cart/delete/{id}',[CartController::class,'deleteCart'])->name('home.cart.deletecart');


Route::get('admin', [DashboardController::class, 'index'])->name('admin.dashboard.index');

// category
Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::post('admin/category/update', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
// brand
Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand.index');
Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
Route::post('admin/brand/create', [BrandController::class, 'store'])->name('admin.brand.store');
Route::get('admin/brand/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
Route::post('admin/brand/update', [BrandController::class, 'edit'])->name('admin.brand.edit');
Route::get('admin/brand/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');

// product
Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('admin/product/create', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::post('admin/product/update', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::get('admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
// customer
Route::get('admin/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
Route::get('admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('admin/customer/create', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('admin/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::post('admin/customer/update', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::get('admin/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');
// user
Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('admin/user/create', [UserController::class, 'store'])->name('admin.user.store');
Route::get('admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::post('admin/user/update', [UserController::class, 'edit'])->name('admin.user.edit');
Route::get('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
Route::get('admin/user/changepassword', [UserController::class, 'getpassword'])->name('admin.user.getpassword');
Route::post('admin/user/changepassword', [UserController::class, 'changepassword'])->name('admin.user.changepassword');
// order
Route::get('admin/order', [OrderController::class, 'index'])->name('admin.order.index');
Route::get('admin/order/create', [OrderController::class, 'create'])->name('admin.order.create');
Route::post('admin/order/create', [OrderController::class, 'store'])->name('admin.order.store');
Route::get('admin/order/update/{id}', [OrderController::class, 'update'])->name('admin.order.update');
Route::post('admin/order/update', [OrderController::class, 'edit'])->name('admin.order.edit');
// Orderdetails
Route::get('admin/orderdetails/{id}', [OrderdetailController::class, 'index'])->name('admin.orderdetail.index');
// Route::get('test', [OrderController::class,'test']);
Route::get('admin/order/quantity/{oid}&{odid}&{type}&{quantity}', [OrderController::class, 'quantity'])->name('admin.order.quantityupdate');
