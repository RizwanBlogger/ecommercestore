<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\AuthApiController;
use App\Http\Controllers\admin\product\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('signin', [AuthApiController::class, 'store'])->name('submitLogin');


// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/logout',[AuthApiController::class,'logout']);
//     Route::post('/product/submit',[ProductController::class,'store']);
//     Route::get('/get-product',[ProductController::class,'get_all_product']);
//     Route::get('/get-by-id-product/{id}',[ProductController::class,'get_by_id_product']);
//     Route::put('/update/{id}',[ProductController::class,'update']);
//     Route::delete('/delete/{id}',[ProductController::class,'destory']);


//     });
