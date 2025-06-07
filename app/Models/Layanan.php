<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Layanan extends Model
{

    use HasUlids;
    protected $fillable = ['name', 'photos', 'description', 'isdeleted'];

    public function pethouselayanans()
    {
        return $this->hasMany(detailLayanan::class, 'layananId');
    }
}
