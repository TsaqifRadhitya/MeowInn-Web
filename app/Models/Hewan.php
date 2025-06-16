<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasUlids;
    protected $fillable = ['name', 'foto', 'penitipanId','description'];

    public function penitipanLayanans()
    {
        return $this->hasMany(DetaiLayananPenitipan::class, 'hewanId');
    }

    public function penitipan()
    {
        return $this->belongsTo(Penitipan::class, 'penitipanId');
    }
}
