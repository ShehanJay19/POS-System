<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::with(['user','saleItems.product'])->get();
        return view('sales.index',compact('sales'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::where('quantity', '>', 0)->get();
        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,card,cheque'

        ]);
        DB::beginTransaction();
        try {
            $totalAmount = 0;
            $sale=Sale::create([
                'user_id' => Auth::id(),
                'payment_method' => $validated['payment_method'],
                'total_amount' => 0,
                'sale_date' => now(),
            ]);
            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                if($product->quantity < $item['quantity']){
                    throw new \Exception("Insufficient stock for product: " . $product->name);
                }
                $subtotal = $product->price * $item['quantity'];
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $subtotal,
                ]);
                $product->decrement('quantity', $item['quantity']);
                $totalAmount += $subtotal;
            }
            $sale->update(['total_amount' => $totalAmount]);

            Payment::create([
                'sale_id' => $sale->id,
                'amount' => $totalAmount,
                'payment_type' => $validated['payment_method'],
                'date' => now(),
            ]);

            DB::commit();

            return redirect('/sales')->with('success', 'Sale recorded successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales=Sale::with(['user','saleItems.product','payment'])->findOrFail($id);
        return view('sales.show',compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
