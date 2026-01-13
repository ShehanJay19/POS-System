<x-app-layout>
    <div class="p-8 space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Sales Reports</h1>
                <p class="text-gray-600 mt-1">Live metrics from your sales data</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">Export</button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">Schedule</button>
            </div>
        </div>

        <!-- KPI cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Total Sales</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($totalSales, 2) }}</p>
                <p class="text-sm text-gray-500 mt-1">All-time revenue</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Orders</p>
                <p class="text-3xl font-bold text-gray-900">{{ $ordersCount }}</p>
                <p class="text-sm text-gray-500 mt-1">Completed sales</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Avg Order</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($avgOrderValue, 2) }}</p>
                <p class="text-sm text-gray-500 mt-1">Mean ticket size</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Today</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($todaySales, 2) }}</p>
                <p class="text-sm text-gray-500 mt-1">Sales today</p>
            </div>
        </div>

        <!-- Quick charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Sales Trend</h2>
                        <p class="text-sm text-gray-500">Visual snapshot of the last 7 days</p>
                    </div>
                </div>
                <div class="h-64 bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400">
                    Line/area chart placeholder
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Category Mix</h2>
                        <p class="text-sm text-gray-500">Share of revenue by category</p>
                    </div>
                </div>
                <div class="h-64 bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400">
                    Donut chart placeholder
                </div>
            </div>
        </div>

        <!-- Sales trend & categories -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="xl:col-span-2 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Last 7 Days</h2>
                        <p class="text-sm text-gray-500">Daily sales totals</p>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sales</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($dailyAggregates as $day)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ \Carbon\Carbon::parse($day->date)->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm font-semibold text-gray-900">${{ number_format($day->sales, 2) }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $day->orders }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-3 text-sm text-gray-500 text-center">No sales yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Top Categories</h2>
                </div>
                <div class="space-y-3">
                    @forelse($categoryMix as $row)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-700">{{ $row->category }}</span>
                            <span class="font-semibold text-gray-900">${{ number_format($row->total, 2) }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No category sales yet</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent orders -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Recent Daily Sales</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sales</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($dailyAggregates as $day)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($day->date)->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">${{ number_format($day->sales, 2) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $day->orders }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">No sales data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
