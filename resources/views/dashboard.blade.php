<x-app-layout>
    <div class="p-8">
        <!-- Dashboard Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Sales Card -->
            <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-indigo-100 text-sm mb-2">Sales</p>
                        <p class="text-3xl font-bold">$14400.4B</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042L5.07 9H9V5a1 1 0 000-2H6.99A9.01 9.01 0 006 2.75A9.976 9.976 0 003 1zm9.7 10.7a.5.5 0 00-.4.2l-1.8 2.4-2.6-2.6a.5.5 0 00-.8.1l-1 2a.5.5 0 00.4.8h.01a.5.5 0 00.3-.1l.6-.6.4.5a.5.5 0 00.8.1l1.5-2 .8.8a.5.5 0 00.7 0l2-2a.5.5 0 000-.7.5.5 0 00-.7 0l-1.3 1.3-.6-.5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Purchases Card -->
            <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm mb-2">Purchases</p>
                        <p class="text-3xl font-bold">$3322.1B</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042L5.07 9H9V5a1 1 0 000-2H6.99A9.01 9.01 0 006 2.75A9.976 9.976 0 003 1zm9.7 10.7a.5.5 0 00-.4.2l-1.8 2.4-2.6-2.6a.5.5 0 00-.8.1l-1 2a.5.5 0 00.4.8h.01a.5.5 0 00.3-.1l.6-.6.4.5a.5.5 0 00.8.1l1.5-2 .8.8a.5.5 0 00.7 0l2-2a.5.5 0 000-.7.5.5 0 00-.7 0l-1.3 1.3-.6-.5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Sales Returns Card -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm mb-2">Sales Returns</p>
                        <p class="text-3xl font-bold">$2.4M</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Purchases Returns Card -->
            <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-100 text-sm mb-2">Purchases Returns</p>
                        <p class="text-3xl font-bold">$2.9M</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row of Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Today Total Sales -->
            <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm mb-2">Today Total Sales</p>
                        <p class="text-3xl font-bold">$577.8K</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M8.16 2.75a1 1 0 00-1.08 1.318l2.877 6.982H3a1 1 0 000 2h8.6l-2.6 6.5a1 1 0 101.86.8l4-10a1 1 0 000-.96l-4-10a1 1 0 00-1.86.8l.26.65H8.16z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Today Total Received Sales -->
            <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-pink-100 text-sm mb-2">Today Total Received(Sales)</p>
                        <p class="text-3xl font-bold">$556.7K</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042L5.07 9H9V5a1 1 0 000-2H6.99A9.01 9.01 0 006 2.75A9.976 9.976 0 003 1zm9.7 10.7a.5.5 0 00-.4.2l-1.8 2.4-2.6-2.6a.5.5 0 00-.8.1l-1 2a.5.5 0 00.4.8h.01a.5.5 0 00.3-.1l.6-.6.4.5a.5.5 0 00.8.1l1.5-2 .8.8a.5.5 0 00.7 0l2-2a.5.5 0 000-.7.5.5 0 00-.7 0l-1.3 1.3-.6-.5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Today Total Purchases -->
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-cyan-100 text-sm mb-2">Today Total Purchases</p>
                        <p class="text-3xl font-bold">$12.4K</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042L5.07 9H9V5a1 1 0 000-2H6.99A9.01 9.01 0 006 2.75A9.976 9.976 0 003 1zm9.7 10.7a.5.5 0 00-.4.2l-1.8 2.4-2.6-2.6a.5.5 0 00-.8.1l-1 2a.5.5 0 00.4.8h.01a.5.5 0 00.3-.1l.6-.6.4.5a.5.5 0 00.8.1l1.5-2 .8.8a.5.5 0 00.7 0l2-2a.5.5 0 000-.7.5.5 0 00-.7 0l-1.3 1.3-.6-.5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Today Total Expense -->
            <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-lg p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm mb-2">Today Total Expense</p>
                        <p class="text-3xl font-bold">$0.00</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L10 7.586 8.707 6.293z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- This Week Sales & Purchases Chart -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">This Week Sales & Purchases</h2>
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 11-4 0 2 2 0 014 0zM10 12a2 2 0 11-4 0 2 2 0 014 0zM10 18a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </button>
                </div>

                <div class="h-72 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <p class="text-gray-500">Chart placeholder</p>
                    </div>
                </div>

                <div class="mt-4 flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-indigo-600 rounded-full"></div>
                        <span class="text-sm text-gray-600">Sales</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Purchases</span>
                    </div>
                </div>
            </div>

            <!-- Top Selling Products Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Top Selling Products (2024)</h2>

                <div class="h-72 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <p class="text-gray-500">Pie chart placeholder</p>
                    </div>
                </div>

                <div class="mt-4 space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                            <span class="text-gray-700">Orange</span>
                        </div>
                        <span class="text-gray-500">23%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-gray-700">Red Sunglass</span>
                        </div>
                        <span class="text-gray-500">18%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
