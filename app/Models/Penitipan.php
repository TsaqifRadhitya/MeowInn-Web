<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $fillable = ['durasi','total','status_pembayaran','status_penitipan','fk_user'];
}
