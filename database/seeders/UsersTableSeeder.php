<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'first_name' => 'د.أميمة',
            'second_name' => 'خطيب',
            'email' => 'omayma@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.سمير',
            'second_name' => 'خاشوق',
            'email' => 'samir@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.خلدون',
            'second_name' => 'الصابوني',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.يحيى',
            'second_name' => 'عبلا',
            'email' => 'ahmad@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.علي',
            'second_name' => 'قريوي',
            'email' => 'alice@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.مروة',
            'second_name' => 'رحال',
            'email' => 'marwa@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.بشرى',
            'second_name' => 'بكرو',
            'email' => 'bushra@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.عصام',
            'second_name' => 'القراط',
            'email' => 'issam@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'د.سميرة',
            'second_name' => 'حيدور',
            'email' => 'samira@example.com',
            'password' => bcrypt('password'),
            'type' => 'doctor',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);



        //////////////مرضى
        User::create([
            'first_name' => 'تاليا',
            'second_name' => 'جود',
            'email' => 'talia@example.com',
            'password' => bcrypt('password'),
            'type' => 'patient',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'أريج',
            'second_name' => 'هندي',
            'email' => 'rital@example.com',
            'password' => bcrypt('password'),
            'type' => 'patient',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'ريتال',
            'second_name' => 'حسين',
            'email' => 'areej@example.com',
            'password' => bcrypt('password'),
            'type' => 'patient',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        ///////////////متطوعين
        User::create([
            'first_name' => 'أميرة',
            'second_name' => 'حمدي',
            'email' => 'amira@example.com',
            'password' => bcrypt('password'),
            'type' => 'volunteer',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'ليان',
            'second_name' => 'يوسف',
            'email' => 'lyan@example.com',
            'password' => bcrypt('password'),
            'type' => 'volunteer',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'first_name' => 'هديل',
            'second_name' => 'سامي',
            'email' => 'hadeel@example.com',
            'password' => bcrypt('password'),
            'type' => 'volunteer',
            'firebase_token' => 'example_token',
            'remember_token' => Str::random(10)
        ]);


        
    }
}
