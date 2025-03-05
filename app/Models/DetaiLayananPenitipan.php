<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetaiLayananPenitipan extends Model
{
   protected $fillable = ['jumlah','subtotal','fk_detail_layanan','fk_hewan'];
}
