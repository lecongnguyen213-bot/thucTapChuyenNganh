<?php

namespace App\Http\Controllers\admin;
use App\Models\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        // Chỉ truy cập khi đã đăng nhập
        $this->middleware('auth');   

        // Share biến cho tất cả view
        $shops = Shop::all();
        view()->share('shop', $shops);
    }

    public function index()
    {
        $shops = Shop::all();
        return view('admin.shop', compact('shops'));
    }
}
