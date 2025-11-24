<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;

// Trang chủ
Route::get('/', function () {
    return view('index');
})->name('home');

// Auth routes laravel
Auth::routes();

// Logout dùng POST (đúng chuẩn Laravel)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ADMIN — phải đăng nhập mới vào được
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
});

// Các trang home
Route::get('/cart', fn() => view('cart'))->name('cart');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/contact', fn() => view('contact'))->name('contact');

// Route mặc định của Laravel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
