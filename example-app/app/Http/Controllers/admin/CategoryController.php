<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Chỉ truy cập khi đã đăng nhập
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.author.category', compact('categories'));
    }
    public function create()
    {
        return view('admin.author.add');
    }
    public function store(Request $request)
    {
        $categories = Category::create(
            [
                'name' => $request->name, //ten database
                'image' => $request->image,
                'status' => $request->status ?? 0,
            ]
        );
        if ($categories) {
            return redirect()->route('admin.category.index');
        } else {
            return back();
        }
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.author.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'image' => $request->image ?? $category->image,
            'status' => $request->status ?? 0
        ]);

        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')
            ->with('success', 'Category deleted successfully!');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('layout.category_product', compact('category'));
    }

}

