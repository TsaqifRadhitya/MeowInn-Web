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
        // User::create(['name' => 'Tsaqif', 'role' => 'customer', 'email' => 'tsaqif@gmail.com', 'password' => 'Tsaqif10!']);
        User::factory(10)->create();
        $this->call(PetHouse::class);
        // $this->call(LayananSeeder::class);
        $this->call(Report::class);
    }
}
