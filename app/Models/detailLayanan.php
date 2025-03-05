<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailLayanan extends Model
{
    protected $fillable = ['harga', 'status_pengajuan', 'fk_layanan', 'fk_pet_house'];
}
