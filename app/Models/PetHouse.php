<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetHouse extends Model
{
    protected $fillable = ['name','deskripsi','status_buka_pet_house','status_verifikasi','status_penjemputan','radius_penjemputan','alamat','lat','lng','kabupaten'];

    public function user(){
        return $this->belongsTo(User::class,'fk_user');
    }

    public function reports(){
        return $this->hasMany(Report::class,'tujuan');
    }

    public function reportsPenitipan(){
        return $this->hasMany(reportsPenitipan::class,'fk_pethouse');
    }

    public function pethouseLayanans(){
        return $this->hasMany(detailLayanan::class,'fk_pet_house');
    }
}
