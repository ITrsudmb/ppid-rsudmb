<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPoli extends Model
{
    protected $fillable = [
        'poli',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'dokter_id'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
