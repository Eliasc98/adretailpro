<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@adretailpro.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'business-name' => 'AdRetail Pro Admin',
                'business-description' => 'Platform administration account',
                'business-address' => '123 Admin Street, Tech City',
                'address' => '123 Admin Street, Tech City',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Seller User',
                'email' => 'seller@adretailpro.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'business-name' => 'Tech Innovations Store',
                'business-description' => 'Innovative tech products retailer',
                'business-address' => '456 Seller Avenue, Commerce Town',
                'address' => '456 Seller Avenue, Commerce Town',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Buyer User',
                'email' => 'buyer@adretailpro.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'business-name' => null,
                'business-description' => null,
                'business-address' => null,
                'address' => '789 Buyer Street, Shopping City',
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
