<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
// Trang chủ
// Route::get('/', function () {
//     return view('index');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'category_product'])
    ->name('category.show');
Route::get('/product/{id}', [HomeController::class, 'detail'])
    ->name('product.detail');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [PageController::class, 'blogDetail'])->name('blog.detail');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

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
    Route::resource('category', CategoryController::class);
    Route::get('/', [AdminController::class, 'index'])->name('index');
});
// Homepages
// Route::get('/cart', fn() => view('cart'))->name('cart');
// Route::get('/checkout', fn() => view('checkout'))->name('checkout');
// Route::get('/about', fn() => view('about'))->name('about');
// Route::get('/blog', fn() => view('blog'))->name('blog');
// Route::get('/single-blog', fn() => view('single-blog'))->name('single-blog');
// Route::get('/contact', fn() => view('contact'))->name('contact');
