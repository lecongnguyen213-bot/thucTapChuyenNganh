<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        // Chỉ truy cập khi đã đăng nhập
        $this->middleware('auth');   

        // Share biến cho tất cả view
        $products = Product::all();
        view()->share('product', $products);
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }
}
