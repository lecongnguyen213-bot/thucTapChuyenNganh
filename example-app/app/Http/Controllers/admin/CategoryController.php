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
        return view('admin.category', compact('categories'));
    }
    public function create()
    {
        return view('admin.add');
    }
    public function store(Request $request)
    {
        $categories =Category::create(
            [
                'name'=>$request->name, //ten database
            ]
        );
        if ($categories) {
             return redirect()->route('category.index');
            }
        else {
            return back();  
        }
    }    
}
    
