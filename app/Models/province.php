<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    public $incrementing = false;

    protected $fillable = ['provinceName', 'id'];
}
