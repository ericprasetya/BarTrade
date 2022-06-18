<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Models\ProductCategory;
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

Route::get('/', function () {
    return view('home',[
        "categories" => ProductCategory::all(),
        "categoryName" => ""
    ]);
});
Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::resource('/register', RegisterController::class);
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::resource('/products', ProductController::class);
Route::post('/logout', [LoginController::class, 'logout']);

