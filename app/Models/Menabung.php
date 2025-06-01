<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menabung extends Model
{
    protected $fillable = ['tabungan_id', 'nominal', 'tanggal'];

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class);
    }
}
