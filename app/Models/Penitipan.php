<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $fillable = ['durasi', 'total', 'status_pembayaran', 'status_penitipan', 'userId'];

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function hewans()
    {
        return $this->hasMany(Hewan::class, 'penitipanId');
    }

    public function pethouse(){
        return $this->belongsTo(PetHouse::class,'petHouseId');
    }
}
