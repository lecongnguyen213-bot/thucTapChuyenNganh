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