<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\BuyerOnly;
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

Route::get('/', function () {
    return view('index');
});

Route::view('registerView', 'register');
Route::view('loginView', 'login');

Route::post('register', RegisterController::class)->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('seller',[AdminController::class,'seller'])->name('seller');

    Route::middleware('onlyBuyer')->prefix('orders')->group(function () {
        Route::get('create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('store', [OrderController::class, 'store'])->name('orders.store');
        Route::get('list', [OrderController::class, 'list'])->name('orders.list');
    });
});
