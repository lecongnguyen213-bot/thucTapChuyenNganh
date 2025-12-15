<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShopController;

// Trang chủ
Route::get('/', function () {
    return view('index');
})->name('home');
Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // admin — phải đăng nhập mới vào được
// Route::middleware('auth')->group(function () {
    // Nhóm route admin
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {

        Route::resource('product', ProductController::class);
        Route::resource('shop', ShopController::class);
        // Route category trong group admin
        Route::resource('category', CategoryController::class);
        // Route trang admin chính
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

// Homepages
Route::get('/cart', fn() => view('cart'))->name('cart');
Route::get('/checkout', fn() => view('checkout'))->name('checkout');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/single-blog', fn() => view('single-blog'))->name('single-blog');
Route::get('/contact', fn() => view('contact'))->name('contact');
//-----------------------------------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//category-list
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
