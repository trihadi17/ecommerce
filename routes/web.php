<?php

use Illuminate\Support\Facades\Route;

//* CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [ProductController::class,'index'])->name('dashboard');
Route::get('/show/product/{id}', [ProductController::class,'showProduct'])->name('detail-product');

Route::group(['middleware' => 'guest'],function(){
    Route::get('/login', [AuthController::class,'index'])->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('login');
});

Route::group(['middleware' => 'auth'],function(){
    // Cart
    Route::get('/cart',[CartController::class,'index'])->name('cart');
    Route::post('/cart/{id}',[CartController::class,'cart'])->name('cart-create');
    Route::delete('/cart/{id}',[CartController::class,'delete'])->name('cart-delete');

    // Transaction
    Route::get('/transaction',[TransactionController::class,'index'])->name('transaction');
    Route::post('/transaction',[TransactionController::class,'transaction'])->name('transaction');
    Route::get('/transaction/detail/{id}',[TransactionController::class,'detail'])->name('detail-transaction');
    Route::get('/transaction/waiting',[TransactionController::class,'waiting'])->name('waiting');
    Route::post('/transaction/cancel/{id}',[TransactionController::class,'cancelTransaction'])->name('cancel');


    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});
