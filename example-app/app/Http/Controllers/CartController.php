<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId()
        ]);

        return view('cart', compact('cart'));
    }
}
