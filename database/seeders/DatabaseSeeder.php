<?php

namespace Database\Seeders;

use App\Models\Layanan;
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
        User::create(['name' => 'Tsaqif', 'role' => 'meowinn', 'phoneNumber' => fake()->unique()->phoneNumber(), 'email' => 'tsaqif@gmail.com', 'password' => 'Tsaqif10!']);
    }
}
