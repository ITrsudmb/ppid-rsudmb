<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maklumat extends Model
{
    protected $fillable = [
        'judul',
        'keterangan',
        'foto'
    ];
}


