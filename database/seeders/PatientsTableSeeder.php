<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'user_id' => 10,
            'age' => 45,
            'gender' => 'أنثى',
            'diseases' => 'سكري',
            //'image' => 'john_doe_image.png'
        ]);

        Patient::create([
            'user_id' => 11,
            'age' => 70,
            'gender' => 'أنثى',
            'diseases' => 'سرطان',
            'paper_to_prove_cancer' => 'proof.pdf',
            //'image' => 'john_doe_image.png'
        ]);

        Patient::create([
            'user_id' => 12,
            'age' => 50,
            'gender' => 'أنثى',
            'diseases' => 'ضغط الدم',
           // 'image' => 'john_doe_image.png'
        ]);
    }
}
