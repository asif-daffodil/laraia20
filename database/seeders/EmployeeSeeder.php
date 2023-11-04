<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use facker
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //fileds: name, email, gender, phone, city
        // use faker
        $faker = Faker::create();

        // Generate 10 employee records
        for ($i = 0; $i < 100; $i++) {
            DB::table('employees')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'gender' => $faker->randomElement(['male', 'female']),
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
            ]);
        }
    }
}
