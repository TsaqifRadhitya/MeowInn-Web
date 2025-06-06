<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public $incrementing = false;

    protected $fillable = ['districtName', 'cityId'];
    public function city()
    {
        return $this->belongsTo(city::class, 'cityId');
    }
}
