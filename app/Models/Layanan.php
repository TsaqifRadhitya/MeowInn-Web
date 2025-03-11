<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama_layanan','persetujuan'];

    public function Pethouselayanans(){
        return $this->hasMany(detailLayanan::class,'fk_layanan');
    }
}
