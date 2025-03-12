<?php

namespace Database\Seeders;

use App\Models\PetHouse as ModelsPetHouse;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetHouse extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::whereRole('pethouse')->get()->each(function($user){
            ModelsPetHouse::factory(1)->create(['fk_user' => $user->id]);
        });
    }
}
