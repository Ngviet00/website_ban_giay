<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::post('add-cart', [HomeController::class, 'addCart'])->name('add-cart');
Route::post('update-cart', [HomeController::class, 'updateCart'])->name('update-cart');
Route::get('remove-cart/{rowId}', [HomeController::class, 'removeCart'])->name('delete-cart');
Route::get('clear-cart', [HomeController::class, 'clearCart'])->name('clear-cart');
Route::post('update-cart', [HomeController::class, 'updateCart'])->name('update-cart');
Route::get('check-out', [HomeController::class, 'checkOut'])->name('check-out');
Route::get('ordered', [HomeController::class, 'ordered'])->name('ordered');
Route::get('search', [HomeController::class, 'search'])->name('search');
