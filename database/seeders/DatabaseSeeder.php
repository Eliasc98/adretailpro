<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Create regular user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);

        // Create categories
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and accessories',
                'slug' => Str::slug('Electronics')
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing and accessories',
                'slug' => Str::slug('Fashion')
            ],
            [
                'name' => 'Home & Living',
                'description' => 'Home decor and furniture',
                'slug' => Str::slug('Home & Living')
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create sample products
        $products = [
            [
                'category_id' => 1,
                'user_id' => $admin->id,
                'name' => 'Wireless Earbuds',
                'description' => 'High-quality wireless earbuds with noise cancellation',
                'price' => 99.99,
                'stock' => 50,
                'featured' => true,
                'status' => 'active',
                'discount' => 10.00,
                'rating' => 4.5
            ],
            [
                'category_id' => 1,
                'user_id' => $admin->id,
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with health tracking',
                'price' => 199.99,
                'stock' => 30,
                'featured' => true,
                'status' => 'active',
                'discount' => 15.00,
                'rating' => 4.8
            ],
            [
                'category_id' => 2,
                'user_id' => $admin->id,
                'name' => 'Designer T-Shirt',
                'description' => 'Premium cotton t-shirt with unique design',
                'price' => 29.99,
                'stock' => 100,
                'featured' => true,
                'status' => 'active',
                'discount' => 5.00,
                'rating' => 4.2
            ],
            [
                'category_id' => 3,
                'user_id' => $admin->id,
                'name' => 'Modern Table Lamp',
                'description' => 'Elegant table lamp with adjustable brightness',
                'price' => 79.99,
                'stock' => 25,
                'featured' => false,
                'status' => 'active',
                'discount' => 20.00,
                'rating' => 4.6
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();

        // Call seeders in the correct order
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            BlogSeeder::class,
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
