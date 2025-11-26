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
        $this->middleware('auth');   

        // Share biến cho tất cả view
        $categories = Category::all();
        view()->share('categories', $categories);
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.cate.category', compact('categories'));
    }
    public function create()
    {
        return view('admin.cate.add');
    }
    public function store(Request $request)
    {
        $categories =Category::create(
            [
                'name'=>$request->name, //ten database
            ]
        );
        if ($categories) {
             return redirect()->route('admin.category.index');
            }
        else {
            return back();  
        }
    }  
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.cate.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|min:3'
    ]);
        $category = Category::findOrFail($id);
        $category->update([
        'name' => $request->name
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
}
    
