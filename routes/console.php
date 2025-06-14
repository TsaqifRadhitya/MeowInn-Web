<?php

use App\Models\User;
use App\Models\PetHouse;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    PetHouse::where('penalty', '>', 0)->get()->each(function (PetHouse $a) {
        $a->decrement('penalty');
    });
})->dailyAt('00.00');
