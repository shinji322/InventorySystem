<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and gadgets'
        ]);

        $clothing = Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel and fashion items'
        ]);

        $books = Category::create([
            'name' => 'Books',
            'description' => 'Books and educational materials'
        ]);

        // Create products
        Product::create([
            'name' => 'Laptop Computer',
            'description' => 'High-performance laptop for work and gaming',
            'price' => 1299.99,
            'quantity' => 25,
            'sku' => 'LAPTOP-001',
            'category_id' => $electronics->id
        ]);

        Product::create([
            'name' => 'Wireless Headphones',
            'description' => 'Noise-cancelling wireless headphones',
            'price' => 199.99,
            'quantity' => 50,
            'sku' => 'HEAD-001',
            'category_id' => $electronics->id
        ]);

        Product::create([
            'name' => 'Cotton T-Shirt',
            'description' => 'Comfortable cotton t-shirt in various sizes',
            'price' => 24.99,
            'quantity' => 100,
            'sku' => 'TSHIRT-001',
            'category_id' => $clothing->id
        ]);

        Product::create([
            'name' => 'Programming Book',
            'description' => 'Complete guide to web development',
            'price' => 49.99,
            'quantity' => 30,
            'sku' => 'BOOK-001',
            'category_id' => $books->id
        ]);

        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest model smartphone with advanced features',
            'price' => 899.99,
            'quantity' => 15,
            'sku' => 'PHONE-001',
            'category_id' => $electronics->id
        ]);
    }
}