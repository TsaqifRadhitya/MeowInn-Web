<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetaiLayananPenitipan extends Model
{
    protected $fillable = ['jumlah', 'subtotal', 'fk_detail_layanan', 'fk_hewan'];

    public function Layanans(){
        $this->belongsTo(detailLayanan::class,'fk_detail_layanan');
    }

    public function hewan(){
        return $this->belongsTo(Hewan::class,'fk_penitipan');
    }
}
