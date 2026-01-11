<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Sale / Checkout</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Products List -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Available Products</h3>

                        <div class="mb-4">
                            <label for="productSearch" class="sr-only">Search products</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" /></svg>
                                <input id="productSearch" type="text" placeholder="Search by name or SKU" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" oninput="filterProducts()">
                            </div>
                        </div>

                        <div id="productList" class="space-y-2 max-h-96 overflow-y-auto">
                            @foreach($products as $product)
                                <div class="product-item border rounded p-3 hover:bg-gray-50 cursor-pointer" data-name="{{ strtolower($product->name) }}" data-sku="{{ strtolower($product->sku) }}" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, {{ $product->quantity }})">
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="font-semibold">{{ $product->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $product->sku }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-semibold text-green-600">${{ number_format($product->price, 2) }}</div>
                                            <div class="text-sm text-gray-500">Stock: {{ $product->quantity }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Cart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Cart</h3>

                        <form action="{{ route('sales.store') }}" method="POST" id="saleForm">
                            @csrf

                            <div id="cartItems" class="space-y-2 mb-4 max-h-64 overflow-y-auto">
                                <p class="text-gray-500 text-center py-8">Cart is empty</p>
                            </div>

                            <div class="border-t pt-4">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-xl font-bold">Total:</span>
                                    <span class="text-2xl font-bold text-green-600" id="totalAmount">$0.00</span>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Payment Method</label>
                                    <select name="payment_method" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                        <option value="cheque">Cheque</option>
                                    </select>
                                </div>

                                <button type="submit" id="checkoutBtn" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded" disabled>
                                    Complete Sale
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        let total = 0;

        function filterProducts() {
            const query = document.getElementById('productSearch')?.value.toLowerCase().trim();
            const items = document.querySelectorAll('#productList .product-item');
            if (!items) return;
            items.forEach(item => {
                const name = item.dataset.name || '';
                const sku = item.dataset.sku || '';
                const match = !query || name.includes(query) || sku.includes(query);
                item.style.display = match ? '' : 'none';
            });
        }

        function addToCart(productId, name, price, maxQuantity) {
            const existingItem = cart.find(item => item.product_id === productId);

            if (existingItem) {
                if (existingItem.quantity < maxQuantity) {
                    existingItem.quantity++;
                } else {
                    alert('Cannot add more. Maximum stock reached!');
                    return;
                }
            } else {
                cart.push({
                    product_id: productId,
                    name: name,
                    price: price,
                    quantity: 1,
                    maxQuantity: maxQuantity
                });
            }

            updateCart();
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.product_id !== productId);
            updateCart();
        }

        function updateQuantity(productId, change) {
            const item = cart.find(item => item.product_id === productId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(productId);
                } else if (item.quantity > item.maxQuantity) {
                    item.quantity = item.maxQuantity;
                    alert('Maximum stock reached!');
                } else {
                    updateCart();
                }
            }
        }

        function updateCart() {
            const cartContainer = document.getElementById('cartItems');
            const form = document.getElementById('saleForm');
            const checkoutBtn = document.getElementById('checkoutBtn');

            // Clear existing hidden inputs
            const existingInputs = form.querySelectorAll('input[name^="items"]');
            existingInputs.forEach(input => input.remove());

            if (cart.length === 0) {
                cartContainer.innerHTML = '<p class="text-gray-500 text-center py-8">Cart is empty</p>';
                checkoutBtn.disabled = true;
                total = 0;
            } else {
                let html = '';
                total = 0;

                cart.forEach((item, index) => {
                    const subtotal = item.price * item.quantity;
                    total += subtotal;

                    html += `
                        <div class="border rounded p-3 flex justify-between items-center">
                            <div class="flex-1">
                                <div class="font-semibold">${item.name}</div>
                                <div class="text-sm text-gray-500">$${item.price.toFixed(2)} each</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="updateQuantity(${item.product_id}, -1)" class="bg-red-500 text-white px-2 py-1 rounded">-</button>
                                <span class="font-semibold">${item.quantity}</span>
                                <button type="button" onclick="updateQuantity(${item.product_id}, 1)" class="bg-green-500 text-white px-2 py-1 rounded">+</button>
                                <span class="font-semibold ml-2">$${subtotal.toFixed(2)}</span>
                                <button type="button" onclick="removeFromCart(${item.product_id})" class="text-red-600 ml-2">✕</button>
                            </div>
                        </div>
                    `;

                    // Add hidden inputs for form submission
                    const productInput = document.createElement('input');
                    productInput.type = 'hidden';
                    productInput.name = `items[${index}][product_id]`;
                    productInput.value = item.product_id;
                    form.appendChild(productInput);

                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'hidden';
                    quantityInput.name = `items[${index}][quantity]`;
                    quantityInput.value = item.quantity;
                    form.appendChild(quantityInput);
                });

                cartContainer.innerHTML = html;
                checkoutBtn.disabled = false;
            }

            document.getElementById('totalAmount').textContent = `$${total.toFixed(2)}`;
        }
    </script>
</x-app-layout>
