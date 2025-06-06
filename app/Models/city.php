<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public $incrementing = false;

    protected $fillable = ['cityName', 'proviceId'];

    public function province(){
        return $this->belongsTo(Province::class,'proviceId');
    }
}
