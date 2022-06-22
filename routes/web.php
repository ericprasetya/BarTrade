<?php

use App\Http\Controllers\BarterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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


Route::middleware('auth')->group(function(){
    Route::get('/products/{product}/transaction', [ProductController::class, 'transaction']);
    Route::post('/transaction', [BarterController::class, 'store']);
});
Route::get('/aboutUs', function(){
    return view('aboutUs',[
        "categories" => ProductCategory::all(),
        "categoryName" => ""
    ]);
});
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/user/{user:username}/edit', [UserController::class, 'edit']);
Route::put('/user/{user:username}', [UserController::class, 'update']);
Route::get('/barter/{barter}', [BarterController::class, 'show']);
