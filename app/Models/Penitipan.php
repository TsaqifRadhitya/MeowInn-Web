<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    protected $fillable = ['durasi', 'total', 'status_pembayaran', 'status_penitipan', 'fk_user'];

    public function reports_penitipan()
    {
        $this->hasMany(ReportsPenitipan::class, 'fk_penitipan');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function hewans()
    {
        return $this->hasMany(Hewan::class, 'fk_penitipan');
    }
}
