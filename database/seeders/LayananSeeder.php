<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create(['nama_layanan' => 'Grooming','persetujuan' => false]);
    }
}
