<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalSalesCount = Sale::count();
        $totalRevenue = Sale::sum('total_amount');
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        $recentSales = Sale::with(['user','saleItems.product'])->orderBy('created_at','desc')->take(5)->get();

        $lowStockProducts = Product::where('quantity','<',5)->get();

        return view('dashboard.index',compact(
            'totalSalesCount',
            'totalRevenue',
            'totalProducts',
            'totalCategories',
            'recentSales',
            'lowStockProducts'
        ));
    }
}
