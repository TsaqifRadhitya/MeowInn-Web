<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetHouse extends Model
{
    protected $fillable = ['name','deskripsi','status_pet_house','status_penjemputan','radius_penjemputan','alamat','lat','lng'];
}
