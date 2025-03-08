<?php

use App\Models\PetHouse;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    PetHouse::where('penalty', '>', 0)->get()->each(function (PetHouse $a) {
        PetHouse::whereId($a->id)->update(['penalty' => $a->penalty -1]);
    });
})->dailyAt('17:00');
