<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Bắt buộc đăng nhập mới vào admin được
        $this->middleware('auth');
    }
    public function index()
    {
        return view('layout.admin'); // đúng đường dẫn view
    }
}
