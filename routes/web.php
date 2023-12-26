<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\user\UserController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\cart\CartController;
use App\Http\Controllers\frontend\UserLoginController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\fronted\order\MyOrderController;
use App\Http\Controllers\frontend\rating\RatingController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\front\CustomerDashboardController;
use App\Http\Controllers\admin\auth\AuthenticationController;
use App\Http\Controllers\admin\dashboard\DashboardController;
use App\Http\Controllers\frontend\checkout\CheckOutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/',[UserController::class,'index'])->name('dashboard');

Route::get('/admin/login',[AuthenticationController::class,'index'])->name('login');
Route::post('/admin/signin',[AuthenticationController::class,'submit'])->name('submitlogin');

Route::group(['prefix'=> 'admin','as'=>'admin:'],function(){
    Route::group(['middleware'=>'auth:web'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
        /////User Route
        Route::get('/user/list',[UserController::class,'index'])->name('user.list');
        Route::get('/user/create',[UserController::class,'create'])->name('user.create');
        Route::post('/user/submit',[UserController::class,'submit'])->name('user.submit');
        Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
        Route::get('/user/delete/{id}',[UserController::class,'destory'])->name('user.delete');
        ////category Route
        Route::get('/category/list',[CategoryController::class,'index'])->name('category.list');
        Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/category/submit',[CategoryController::class,'submit'])->name('category.submit');
        Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/category/delete/{id}',[CategoryController::class,'destory'])->name('category.delete');

        ////Product Route
        Route::get('/product/list',[ProductController::class,'index'])->name('product.list');
        Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
        Route::post('/product/submit',[ProductController::class,'submit'])->name('product.submit');
        Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/product/delete/{id}',[ProductController::class,'destory'])->name('product.delete');

        ///Order Route

        Route::get('/orders',[OrderController::class,'index'])->name('all.orders');
        Route::get('/view-order/{id}',[OrderController::class,'view'])->name('view.orders');
        Route::post('/order/status/{id}',[OrderController::class,'status'])->name('order.status');
        Route::get('/order-history',[OrderController::class,'history'])->name('order.history');

    });
});


Route::get('/',[FrontendController::class,'index'])->name('front.index');
Route::get('/product-detail/{id}',[FrontendController::class,'detail'])->name('product.detail');

Route::get('/user/login',[UserLoginController::class,'login'])->name('login');
Route::post('/user/signup',[UserLoginController::class,'submit'])->name('customer.signup');

Route::post('/signin',[UserLoginController::class,'customersignin'])->name('customer.login');
Route::prefix('customer')->group(function () {
Route::group(['middleware'=>'auth:customer'],function(){
    Route::get('/logout',[CustomerDashboardController::class,'logout'])->name('logouts');
    Route::post('/addtocart',[CartController::class,'addtocart']);
    Route::get('/cart',[CartController::class,'cart']);
    Route::get('/delete-cart-item/{id}',[CartController::class,'deleteproduct']);
    Route::get('/checkout',[CheckOutController::class,'index']);
    Route::post('/place-order',[CheckOutController::class,'placeorder']);
    Route::get('/my-order',[MyOrderController::class,'index']);
    Route::get('/view-order/{id}',[MyOrderController::class,'view']);
    Route::post('/add-rating',[RatingController::class,'add']);

});
});
