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
