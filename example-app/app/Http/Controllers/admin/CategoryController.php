<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function _construct()
    {
        $this->middleware('auth');
        $categories=Category::ortherBy('id','decs')->get();
        view()->share('categories',$categories);
    
    } 
}
