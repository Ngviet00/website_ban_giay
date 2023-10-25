<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\PurchaseHistoryController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('is_admin_login');
    Route::post('login', [LoginController::class, 'login'])->name('post-login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::group(['name' => 'purchase-history', 'as' => 'purchase-history.'], function () {
            Route::get('purchase-history', [PurchaseHistoryController::class, 'index'])->name('index');
            Route::get('purchase-history/{id}', [PurchaseHistoryController::class, 'destroy'])->name('destroy');
            Route::get('confirm/{id}', [PurchaseHistoryController::class, 'confirm'])->name('confirm');
        });
    });
});
