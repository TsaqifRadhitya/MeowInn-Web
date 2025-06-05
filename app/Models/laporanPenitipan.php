<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class laporanPenitipan extends Model
{
    use HasUlids;
    protected $fillable = ["caption", "photos", "penitipanId"];

}
