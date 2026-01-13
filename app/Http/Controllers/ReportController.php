<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $totalSales = Sale::sum('total_amount');
        $ordersCount = Sale::count();
        $avgOrderValue = $ordersCount > 0 ? Sale::avg('total_amount') : 0;
        $todaySales = Sale::whereDate('sale_date', Carbon::today())->sum('total_amount');

        $periodStart = Carbon::today()->subDays(6);
        $dailyAggregates = Sale::selectRaw('DATE(sale_date) as date, SUM(total_amount) as sales, COUNT(*) as orders')
            ->where('sale_date', '>=', $periodStart)
            ->groupBy(DB::raw('DATE(sale_date)'))
            ->orderBy('date', 'desc')
            ->get();

        $categoryMix = SaleItem::selectRaw('categories.name as category, SUM(sale_items.quantity * sale_items.unit_price) as total')
            ->join('products', 'sale_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        return view('reports.index', [
            'totalSales' => $totalSales,
            'ordersCount' => $ordersCount,
            'avgOrderValue' => $avgOrderValue,
            'todaySales' => $todaySales,
            'dailyAggregates' => $dailyAggregates,
            'categoryMix' => $categoryMix,
        ]);
    }
}
