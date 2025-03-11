<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailLayanan extends Model
{
    protected $fillable = ['harga', 'status_pengajuan', 'fk_layanan', 'fk_pet_house'];

    public function pethouse(){
        return $this->belongsTo(PetHouse::class,'fk_pet_house');
    }

    public function layanan(){
        return $this->belongsTo(Layanan::class,'fk_layanan');
    }

    public function penitipanLayanans(){
        $this->hasMany(DetaiLayananPenitipan::class,'fk_detail_layanan');
    }
}
