<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class detailLayanan extends Model
{

    use HasUlids;
    protected $fillable = ['price', 'description', 'photos', 'status', 'layananId', 'petHouseId'];

    public function pethouse()
    {
        return $this->belongsTo(PetHouse::class, 'petHouseId');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layananId');
    }

    public function penitipanLayanans()
    {
        $this->hasMany(DetaiLayananPenitipan::class, 'detailLayananId');
    }

    public function penitipanLayanansActive()
    {
        $this->belongsTo(Layanan::class, 'detailLayananId')->where('status', true);
    }
}
