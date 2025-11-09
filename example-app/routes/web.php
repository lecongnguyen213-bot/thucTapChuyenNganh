<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/admin/product-list', function () {
    return view('admin/product-list');
})->name('product-list');
Route::get('/admin/category', function () {
    return view('admin/category');
})->name('category');