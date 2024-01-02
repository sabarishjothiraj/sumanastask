<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class,'index']);

Route::get('/products', [ProductController::class,'index']);
Route::get('/checkout/{id}', [ProductController::class,'checkout'])->name('checkout');;
Route::get('success', [ProductController::class,'ssuccess'])->name('success');
Route::get('cancel', [ProductController::class,'scancel'])->name('cancel');
Route::post('purchase', ['as'=>'purchase','uses'=>'ProductController@purchase']);
//Route::post('checkout', ['as'=>'checkout','uses'=>'ProductController@checkout']);