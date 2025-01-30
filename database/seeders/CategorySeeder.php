<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();

        $categories = [
            [
                'name' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'description' => 'Latest gadgets and electronic devices'
            ],
            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'description' => 'Trendy clothing and accessories'
            ],
            [
                'name' => 'Home & Kitchen',
                'slug' => Str::slug('Home & Kitchen'),
                'description' => 'Household essentials and appliances'
            ],
            [
                'name' => 'Books & Media',
                'slug' => Str::slug('Books & Media'),
                'description' => 'Books, magazines, and digital content'
            ],
            [
                'name' => 'Sports & Outdoors',
                'slug' => Str::slug('Sports & Outdoors'),
                'description' => 'Sporting goods and outdoor equipment'
            ],
            [
                'name' => 'Beauty & Personal Care',
                'slug' => Str::slug('Beauty & Personal Care'),
                'description' => 'Cosmetics, skincare, and grooming products'
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
