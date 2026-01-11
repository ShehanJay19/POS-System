<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">SKU</h3>
                            <p class="text-lg text-gray-900">{{ $product->sku }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Name</h3>
                            <p class="text-lg text-gray-900">{{ $product->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Category</h3>
                            <p class="text-lg text-gray-900">{{ $product->category->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Price</h3>
                            <p class="text-lg text-gray-900">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Stock Quantity</h3>
                            <p class="text-lg text-gray-900">{{ $product->quantity }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Description</h3>
                        <p class="text-gray-900">{{ $product->description ?? 'No description available' }}</p>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <a href="{{ route('products.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
