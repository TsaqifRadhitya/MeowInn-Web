<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $fillable = ['nama', 'foto', 'fk_penitipan'];

    public function penitipanLayanans(){
        return $this->hasMany(DetaiLayananPenitipan::class,'fk_penitipan');
    }

    public function penitipan(){
        return $this->belongsTo(Penitipan::class,'fk_penitipan');
    }
}
