<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['jenis_reports', 'isi', 'userId', 'pethouseId'];

    public function petHouse()
    {
        return $this->belongsTo(PetHouse::class, 'pethouseId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
