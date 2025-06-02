<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Layanan extends Model
{

    use HasUlids;
    protected $fillable = ['name', 'photos', 'description', 'isdeleted'];

    protected function photos(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    public function Pethouselayanans()
    {
        return $this->hasMany(detailLayanan::class, 'layananId');
    }
}
