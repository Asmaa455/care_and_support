<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            PatientsTableSeeder::class,
            DoctorsTableSeeder::class,
            VolunteersTableSeeder::class,
            MedicalConsultationsTableSeeder::class,
            PatientAidsTableSeeder::class,
            AwarenessPostsTableSeeder::class,
            MedicationTimesTableSeeder::class,
            DiseasesTableSeeder::class,
            HealthyValuesTableSeeder::class,
            WalletsTableSeeder::class,
        ]);
    }
}
