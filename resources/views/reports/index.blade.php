<x-app-layout>
    <div class="p-8 space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Reports</h1>
                <p class="text-gray-600 mt-1">Daily, weekly, and monthly performance snapshots</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">Export</button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">Schedule</button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex gap-2">
            <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white">Daily</button>
            <button class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Weekly</button>
            <button class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Monthly</button>
        </div>

        <!-- KPI cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Sales</p>
                <p class="text-3xl font-bold text-gray-900">$12,450</p>
                <p class="text-sm text-green-600 mt-1">+8% vs prev</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Purchases</p>
                <p class="text-3xl font-bold text-gray-900">$6,320</p>
                <p class="text-sm text-green-600 mt-1">+3% vs prev</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Returns</p>
                <p class="text-3xl font-bold text-gray-900">$430</p>
                <p class="text-sm text-red-600 mt-1">-2% vs prev</p>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <p class="text-sm text-gray-500">Net Profit</p>
                <p class="text-3xl font-bold text-gray-900">$5,700</p>
                <p class="text-sm text-green-600 mt-1">+5% vs prev</p>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="xl:col-span-2 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Sales vs Purchases</h2>
                        <p class="text-sm text-gray-500">Trend over selected period</p>
                    </div>
                    <button class="text-sm text-gray-600 hover:text-gray-900">More</button>
                </div>
                <div class="h-72 bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400">
                    Line/Area Chart Placeholder
                </div>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Category Mix</h2>
                    <button class="text-sm text-gray-600 hover:text-gray-900">More</button>
                </div>
                <div class="h-72 bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400">
                    Pie/Donut Chart Placeholder
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Recent Daily Reports</h2>
                <div class="flex items-center gap-3">
                    <input type="date" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Filter</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sales</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purchases</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Returns</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Net</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">2026-01-12</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$1,240</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$620</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$40</td>
                            <td class="px-6 py-4 text-sm font-semibold text-green-600">$580</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">2026-01-11</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$980</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$430</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$30</td>
                            <td class="px-6 py-4 text-sm font-semibold text-green-600">$520</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
