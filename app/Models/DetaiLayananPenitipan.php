<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class DetaiLayananPenitipan extends Model
{
    use HasUlids;
    protected $fillable = ['jumlah', 'price', 'detailLayananId', 'hewanId'];

    public function pethouseLayanan(){
        return $this->belongsTo(detailLayanan::class,'detailLayananId');
    }

    public function hewan(){
        return $this->belongsTo(Hewan::class,'hewanId');
    }
}
