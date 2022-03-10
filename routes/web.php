<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AssetController;

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

//Route::get('/', function () {
//    return view('welcome');//デフォルト：welcome.blade.phpを表示する
//});

//Route::resource('book', BookController::class);

//Route::resource('/', LicenseController::class);
Route::resource('license', LicenseController::class);
Route::resource('product', ProductController::class);
Route::resource('asset', AssetController::class);