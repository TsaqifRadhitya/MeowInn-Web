<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class villages extends Model
{
    public $incrementing = false;

    protected $fillable = ['villageName','districtId'] ;
    public function district()
    {
        return $this->belongsTo(district::class, "districtId");
    }
}
