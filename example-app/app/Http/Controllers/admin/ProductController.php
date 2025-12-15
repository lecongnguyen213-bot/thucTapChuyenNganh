<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    public function __construct()
    {
        // Chỉ truy cập khi đã đăng nhập
        $this->middleware('auth');

        // Share biến cho tất cả view
        $products = Product::all();
        view()->share('products', $products); // ✔ sửa đúng
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.prod.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.prod.add', compact('categories'));
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name ?? '',
            'title' => $request->title ?? '',
            'image' => $request->image ?? '',
            'price' => $request->price ?? 0,
            'description' => $request->description ?? '',
            'status' => $request->status ?? 0,
            'category_id' => $request->category_id ?? null,
            'content' => $request->input('content', ''),
        ]);

        return redirect()->route('admin.product.index')
            ->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.prod.edit', compact('product', 'categories')); // ✔ đúng view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'title' => $request->title,
            'image' => $request->image ?? $product->image,
            'price' => $request->price ?? 0,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'content' => $request->input('content', ''),
        ]);

        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product deleted successfully!');
    }
}
