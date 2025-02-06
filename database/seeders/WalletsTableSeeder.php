<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wallet::create([
            'user_id' => 1,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 2,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Wallet::create([
            'user_id' => 3,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 4,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 5,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 6,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Wallet::create([
            'user_id' => 7,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 8,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 9,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 10,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 11,
            'current_balance' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Wallet::create([
            'user_id' => 12,
            'current_balance' => 1500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
