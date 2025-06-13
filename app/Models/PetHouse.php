<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHouse extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = ['name', 'petCareCost', 'description', 'locationPhotos', 'penalty', 'isOpen', 'verificationStatus', 'pickUpService', 'range', 'userId'];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'pethouseId');
    }

    public function pethouseLayanans()
    {
        return $this->hasMany(detailLayanan::class, 'petHouseId');
    }

    public function penitipans()
    {
        return $this->hasMany(Penitipan::class, 'petHouseId');
    }
}
