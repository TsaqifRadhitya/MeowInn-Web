<?php

namespace Database\Seeders;

use App\Models\Report as ModelsReport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Report extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::whereRole('customer')->get()->each(function($e){
            ModelsReport::factory(5)->create(['fk_user' => $e->id]);
        });
    }
}
