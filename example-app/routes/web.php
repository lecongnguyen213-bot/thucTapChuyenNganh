<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthConTroller;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
Route::get('/', function () {
    return view('index');
})->name('home');
//chuyển hướng page home->register->login->admin
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/adminpage', [AdminController::class, 'index'])->name('adminpage')->middleware('auth');

//home page routes
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//admin page routes
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
