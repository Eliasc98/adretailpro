<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        // Get category IDs
        $categories = DB::table('categories')->get();

        // Get seller user ID
        $sellerId = DB::table('users')->where('role', 'customer')->first()->id;

        $products = [
            // Electronics
            [
                'name' => 'Apple iPhone 14 Pro',
                'description' => 'High-end smartphone with advanced camera and A16 Bionic chip',
                'category_id' => $categories->firstWhere('name', 'Electronics')->id,
                'user_id' => $sellerId,
                'price' => 2499.99,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1615247169971-0c3c80a9d205?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => true,
                'discount' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sony WH-1000XM5 Headphones',
                'description' => 'Premium noise-cancelling wireless headphones with exceptional sound quality',
                'category_id' => $categories->firstWhere('name', 'Electronics')->id,
                'user_id' => $sellerId,
                'price' => 799.99,
                'stock' => 75,
                'image' => 'https://images.unsplash.com/photo-1599669454951-1c11b650fe3b?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => false,
                'discount' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Fashion
            [
                'name' => 'Leather Biker Jacket',
                'description' => 'Classic black leather jacket with modern cut and premium leather',
                'category_id' => $categories->firstWhere('name', 'Fashion')->id,
                'user_id' => $sellerId,
                'price' => 1299.99,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1551028719-ade4bdc3c8fb?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => true,
                'discount' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Summer Floral Maxi Dress',
                'description' => 'Elegant lightweight dress with vibrant floral print, perfect for summer events',
                'category_id' => $categories->firstWhere('name', 'Fashion')->id,
                'user_id' => $sellerId,
                'price' => 449.99,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1464863979621-258859e62245?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => false,
                'discount' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Home & Kitchen
            [
                'name' => 'Breville Precision Brewer',
                'description' => 'Smart coffee maker with precise temperature control and customizable brewing',
                'category_id' => $categories->firstWhere('name', 'Home & Kitchen')->id,
                'user_id' => $sellerId,
                'price' => 599.99,
                'stock' => 40,
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => true,
                'discount' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Books & Media
            [
                'name' => 'Bestseller Book Collection',
                'description' => 'Curated collection of top-rated contemporary novels from award-winning authors',
                'category_id' => $categories->firstWhere('name', 'Books & Media')->id,
                'user_id' => $sellerId,
                'price' => 299.99,
                'stock' => 200,
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => false,
                'discount' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Sports & Outdoors
            [
                'name' => 'Nike Air Zoom Pegasus 39',
                'description' => 'High-performance running shoes with responsive cushioning and breathable design',
                'category_id' => $categories->firstWhere('name', 'Sports & Outdoors')->id,
                'user_id' => $sellerId,
                'price' => 899.99,
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => true,
                'discount' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Beauty & Personal Care
            [
                'name' => 'La Mer Luxury Skincare Set',
                'description' => 'Premium skincare collection featuring regenerative moisturizers and serums',
                'category_id' => $categories->firstWhere('name', 'Beauty & Personal Care')->id,
                'user_id' => $sellerId,
                'price' => 699.99,
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1585232350483-ede25f9f8a91?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'featured' => false,
                'discount' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('products')->insert($products);
    }
}
