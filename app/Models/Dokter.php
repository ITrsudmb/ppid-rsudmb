<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalPoli;

class Dokter extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'spesialis',
        'foto'
    ];

        // ✅ RELASI KE JADWAL POLI
    public function jadwalPoli()
    {
        return $this->hasMany(JadwalPoli::class, 'dokter_id');
    }
}
