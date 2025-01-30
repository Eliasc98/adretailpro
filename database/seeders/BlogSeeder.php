<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->truncate();

        // Get user IDs
        $adminUser = DB::table('users')->where('role', 'admin')->first();

        $blogs = [
            [
                'title' => 'Top 10 E-commerce Trends in 2025',
                'slug' => Str::slug('Top 10 E-commerce Trends in 2025'),
                'content' => 'Discover the latest trends shaping the e-commerce landscape in 2025. From AI-powered shopping experiences to sustainable retail practices, this comprehensive guide covers everything you need to know.',
                'author_id' => $adminUser->id,
                'featured_image' => 'https://via.placeholder.com/800x400?text=E-commerce+Trends',
                'published_at' => Carbon::now()->subDays(10),
                'status' => 'published',
                'meta_description' => 'Explore the top e-commerce trends that are transforming online retail in 2025.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'How to Boost Your Online Store\'s Conversion Rate',
                'slug' => Str::slug('How to Boost Your Online Store\'s Conversion Rate'),
                'content' => 'Learn proven strategies to increase your online store\'s conversion rate. From optimizing product pages to implementing effective call-to-actions, this blog post provides actionable insights for e-commerce success.',
                'author_id' => $adminUser->id,
                'featured_image' => 'https://via.placeholder.com/800x400?text=Conversion+Rate',
                'published_at' => Carbon::now()->subDays(5),
                'status' => 'published',
                'meta_description' => 'Discover actionable strategies to improve your online store\'s conversion rate and boost sales.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'The Future of Personalized Shopping Experiences',
                'slug' => Str::slug('The Future of Personalized Shopping Experiences'),
                'content' => 'Explore how artificial intelligence and machine learning are revolutionizing personalized shopping. Learn how data-driven recommendations can transform customer engagement and satisfaction.',
                'author_id' => $adminUser->id,
                'featured_image' => 'https://via.placeholder.com/800x400?text=Personalized+Shopping',
                'published_at' => Carbon::now()->subDays(15),
                'status' => 'published',
                'meta_description' => 'Uncover the potential of AI and machine learning in creating personalized shopping experiences.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('blogs')->insert($blogs);
    }
}
