<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\storeControl;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[storeControl::class,'index']);
Route::post('checkout',[storeControl::class,'Checkout'])->name('checkout');
Route::post('cashorder',[storeControl::class,'Cashorder'])->name('cashorder');
Route::post('addtocart',[storeControl::class,'add'])->name('add');
Route::get('cart',[storeControl::class,'cart'])->name('cart');
Route::delete('/cart/{id}', [storeControl::class, 'hapus'])->name('hapus_item');
Route::post('checkoutcart',[storeControl::class,'checkoutCart'])->name('checkoutCart');
Route::post('/callback',[CallbackController::class,'handleCallback']);
Route::get('/History',[storeControl::class, 'historyTrans'])->name('history');
Route::get('/cash',[storeControl::class, 'cash'])->name('cash');
