<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /* ================== HOME ================== */

    public function index()
    {
        return view('index');
    }

    public function category_product($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('layout.category_product', compact('category', 'products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('layout.single_product', compact('product'));
    }

    /* ================== CART ================== */

    // CART PAGE
    public function indexCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // ADD TO CART
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    // UPDATE QUANTITY
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int)$request->quantity);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Đã cập nhật số lượng');
    }

    // REMOVE ITEM
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Đã xóa sản phẩm');
    }

    // CHECKOUT
    public function checkout()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart')
            ->with('success', 'Thanh toán thành công!');
    }
}
