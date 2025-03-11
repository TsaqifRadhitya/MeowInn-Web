<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportsPenitipan extends Model
{
    protected $fillable = ['url','description','fk_penitipan','fk_pet_house'];

    public function PetHouse(){
        return $this->belongsTo(PetHouse::class,'fk_pet_house');
    }

    public function penitipan(){
        return $this->belongsTo(Penitipan::class,'fk_penitipan');
    }
}
