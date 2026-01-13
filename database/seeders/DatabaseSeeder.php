<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@pos.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password')
            ]
        );

        $categories = [
            ['name' => 'Beverages', 'description' => 'Soft drinks, juices, and water'],
            ['name' => 'Snacks', 'description' => 'Chips, crackers, and quick bites'],
            ['name' => 'Dairy', 'description' => 'Milk, cheese, and yogurt'],
            ['name' => 'Produce', 'description' => 'Fresh fruits and vegetables'],
            ['name' => 'Bakery', 'description' => 'Bread, pastries, and baked goods'],
            ['name' => 'Household', 'description' => 'Everyday household essentials'],
        ];

        $categoryIds = collect($categories)->mapWithKeys(function ($data) {
            $category = Category::updateOrCreate(
                ['name' => $data['name']],
                ['description' => $data['description']]
            );

            return [$data['name'] => $category->id];
        });

        $products = [
            ['sku' => 'BEV-001', 'name' => 'Cola 330ml', 'price' => 1.50, 'quantity' => 120, 'category' => 'Beverages'],
            ['sku' => 'BEV-002', 'name' => 'Orange Juice 1L', 'price' => 3.20, 'quantity' => 60, 'category' => 'Beverages'],
            ['sku' => 'SNK-001', 'name' => 'Potato Chips 150g', 'price' => 2.40, 'quantity' => 90, 'category' => 'Snacks'],
            ['sku' => 'SNK-002', 'name' => 'Granola Bar (Box of 6)', 'price' => 4.80, 'quantity' => 45, 'category' => 'Snacks'],
            ['sku' => 'DRY-001', 'name' => 'Whole Milk 1L', 'price' => 2.10, 'quantity' => 70, 'category' => 'Dairy'],
            ['sku' => 'DRY-002', 'name' => 'Cheddar Cheese 200g', 'price' => 5.50, 'quantity' => 40, 'category' => 'Dairy'],
            ['sku' => 'PRD-001', 'name' => 'Bananas (1kg)', 'price' => 1.90, 'quantity' => 100, 'category' => 'Produce'],
            ['sku' => 'PRD-002', 'name' => 'Tomatoes (1kg)', 'price' => 2.30, 'quantity' => 85, 'category' => 'Produce'],
            ['sku' => 'BKE-001', 'name' => 'Sourdough Bread', 'price' => 3.80, 'quantity' => 50, 'category' => 'Bakery'],
            ['sku' => 'BKE-002', 'name' => 'Chocolate Muffins (4-pack)', 'price' => 4.20, 'quantity' => 35, 'category' => 'Bakery'],
            ['sku' => 'HHD-001', 'name' => 'Dish Soap 500ml', 'price' => 2.90, 'quantity' => 60, 'category' => 'Household'],
            ['sku' => 'HHD-002', 'name' => 'Paper Towels (4-roll)', 'price' => 5.20, 'quantity' => 55, 'category' => 'Household'],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['sku' => $product['sku']],
                [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'category_id' => $categoryIds[$product['category']] ?? null,
                ]
            );
        }
    }
}
