<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Volunteer;

class VolunteersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Volunteer::create([
            'user_id' => 13,
            'national_number' => '987654321',
            'contact_information' => '1122334455',
            //'image' => 'jane_roe_image.png'
        ]);

        Volunteer::create([
            'user_id' => 14,
            'national_number' => '957244522',
            'contact_information' => '1122334455',
            //'image' => 'jane_roe_image.png'
        ]);

        Volunteer::create([
            'user_id' => 15,
            'national_number' => '933812765',
            'contact_information' => '1122334455',
            //'image' => 'jane_roe_image.png'
        ]);
    }
}
