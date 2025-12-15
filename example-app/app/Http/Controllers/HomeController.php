<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get(); // chỉ lấy active
        return view('home', compact('categories'));
    }
    public function category_product($id)
    {
        $category = Category::findOrFail($id);

        // LẤY PRODUCT THEO CATEGORY
        $products = Product::where('category_id', $id)->get();

        return view(
            'layout.category_product',
            compact('category', 'products')
        );
    }
        public function detail($id)
    {
        $product = Product::find($id);
        return view('layout.single_product', compact('product'));
    }
}
