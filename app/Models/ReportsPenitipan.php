<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportsPenitipan extends Model
{
    protected $fillable = ['url','description','fk_penitipan','fk_pet_house'];
}
