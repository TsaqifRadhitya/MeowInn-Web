<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['jenis_reports','isi','fk_user','tujuan'];

    public function petHouse(){
        return $this->belongsTo(PetHouse::class,'tujuan');
    }

    public function user(){
        return $this->belongsTo(User::class,'fk_user');
    }
}
