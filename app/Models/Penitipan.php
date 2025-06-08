<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $fillable = ['status', 'duration', 'petCareCosts', 'address', 'villageId', 'isCash', 'isPickUp', 'userId', 'petHouseId','snapToken'];

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function hewans()
    {
        return $this->hasMany(Hewan::class, 'penitipanId');
    }

    public function pethouse()
    {
        return $this->belongsTo(PetHouse::class, 'petHouseId');
    }

    public function laporans()
    {
        return $this->hasMany(laporanPenitipan::class, 'penitipanId');
    }
}
