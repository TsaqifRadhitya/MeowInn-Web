<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $fillable = ['nama', 'foto', 'fk_penitipan'];
}
