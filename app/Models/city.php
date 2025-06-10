<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public $incrementing = false;

    protected $fillable = ['cityName', 'proviceId', 'id'];

    public function province()
    {
        return $this->belongsTo(province::class, 'proviceId');
    }
}
