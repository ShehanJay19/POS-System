<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sale Receipt</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Receipt Header -->
                    <div class="text-center mb-6 border-b pb-4">
                        <h1 class="text-3xl font-bold">POS System</h1>
                        <p class="text-gray-600">Sales Receipt</p>
                    </div>

                    <!-- Sale Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <p class="text-gray-600">Receipt #:</p>
                            <p class="font-semibold text-lg">{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">Date:</p>
                            <p class="font-semibold">{{ $sale->sale_date->format('M d, Y h:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Payment Method:</p>
                            <p class="font-semibold">{{ ucfirst($sale->payment_method) }}</p>
                        </div>
                        @if($sale->user)
                        <div class="text-right">
                            <p class="text-gray-600">Cashier:</p>
                            <p class="font-semibold">{{ $sale->user->name }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Items Table -->
                    <div class="mb-6">
                        <table class="w-full">
                            <thead class="border-b-2 border-gray-300">
                                <tr>
                                    <th class="text-left py-2">Item</th>
                                    <th class="text-center py-2">Qty</th>
                                    <th class="text-right py-2">Price</th>
                                    <th class="text-right py-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($sale->saleItems as $item)
                                    <tr>
                                        <td class="py-3">{{ $item->product->name }}</td>
                                        <td class="text-center py-3">{{ $item->quantity }}</td>
                                        <td class="text-right py-3">${{ number_format($item->unit_price, 2) }}</td>
                                        <td class="text-right py-3">${{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Total -->
                    <div class="border-t-2 border-gray-300 pt-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold">TOTAL:</span>
                            <span class="text-3xl font-bold text-green-600">${{ number_format($sale->total_amount, 2) }}</span>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center text-gray-600 text-sm border-t pt-4">
                        <p>Thank you for your purchase!</p>
                        <p class="mt-2">For inquiries, please contact us.</p>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2 mt-6">
                        <button onclick="window.print()" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Print Receipt
                        </button>
                        <a href="{{ route('sales.index') }}" class="flex-1 text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Sales
                        </a>
                        <a href="{{ route('sales.create') }}" class="flex-1 text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            New Sale
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body * { visibility: hidden; }
            .max-w-3xl, .max-w-3xl * { visibility: visible; }
            .max-w-3xl { position: absolute; left: 0; top: 0; }
            button, a { display: none !important; }
        }
    </style>
</x-app-layout>
