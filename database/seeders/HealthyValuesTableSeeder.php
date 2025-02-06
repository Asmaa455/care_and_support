<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Healthy_Value;

class HealthyValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Healthy_Value::create([
            'patient_id' => 1,
            'disease_id' => 1,
            'value' => 85,
            'valuee' => 90,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 1,
            'disease_id' => 1,
            'value' => 120,
            'valuee' => 110,
            'status' => 'high',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 1,
            'disease_id' => 4,
            'value' => 50,
            'valuee' => 0,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 1,
            'disease_id' => 2,
            'value' => 130,
            'valuee' => 0,
            'status' => 'high',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 1,
            'disease_id' => 3,
            'value' => 10,
            'valuee' => 0,
            'status' => 'لا يوجد اكتئاب',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 2,
            'disease_id' => 3,
            'value' => 17,
            'valuee' => 0,
            'status' => 'اكتئاب متوسط لشديد',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 2,
            'disease_id' => 2,
            'value' => 115,
            'valuee' => 0,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 2,
            'disease_id' => 1,
            'value' => 130,
            'valuee' => 50,
            'status' => 'high',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 2,
            'disease_id' => 1,
            'value' => 85,
            'valuee' => 90,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 2,
            'disease_id' => 4,
            'value' => 70,
            'valuee' => 0,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 3,
            'disease_id' => 1,
            'value' => 85,
            'valuee' => 90,
            'status' => 'normal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 3,
            'disease_id' => 2,
            'value' => 130,
            'valuee' => 0,
            'status' => 'high',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 3,
            'disease_id' => 3,
            'value' => 21,
            'valuee' => 0,
            'status' => 'اكتئاب شديد',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 3,
            'disease_id' => 4,
            'value' => 60,
            'valuee' => 0,
            'status' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Healthy_Value::create([
            'patient_id' => 3,
            'disease_id' => 1,
            'value' => 120,
            'valuee' => 60,
            'status' => 'high',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
