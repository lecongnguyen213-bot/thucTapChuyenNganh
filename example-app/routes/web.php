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

// admin — phải đăng nhập mới vào được
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/admin/shop', [ShopController::class, 'index'])->name('shop');
});

// Các trang home
Route::get('/cart', fn() => view('cart'))->name('cart');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/single-blog', fn() => view('single-blog'))->name('single-blog');
Route::get('/contact', fn() => view('contact'))->name('contact');
//-----------------------------------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
