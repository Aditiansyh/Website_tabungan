<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'target_nominal',
        'target_tanggal',
        'foto',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menabung()
    {
        return $this->hasMany(Menabung::class);
    }
}
