<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Auth;

class Layanan extends Model
{

    use HasUlids;
    protected $fillable = ['name', 'photos', 'description', 'isdeleted'];

    public function pethouselayanans()
    {
        return $this->hasOne(detailLayanan::class, 'layananId')->where('petHouseId', Auth::user()->petHouses->id);
    }
}
