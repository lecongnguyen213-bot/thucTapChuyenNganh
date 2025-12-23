<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        // Tổng số
        $totalCategories = Category::count();
        $totalProducts   = Product::count();

        // Product theo trạng thái
        $activeProducts   = Product::where('status', 1)->count();
        $inactiveProducts = Product::where('status', 0)->count();

        // Category có nhiều product nhất
        $topCategories = Category::select(
                'categories.id',
                'categories.name',
                DB::raw('COUNT(products.id) as product_count')
            )
            ->leftJoin('products', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('product_count')
            ->limit(5)
            ->get();

        return view('admin.dashboard1', compact(
            'totalCategories',
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'topCategories'
        ));
    }
}
