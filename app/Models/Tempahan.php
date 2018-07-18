<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempahan extends Model
{
    # Maklumat table yang perlu dihubungi oleh Model ini
    protected $table = 'tempahan';

    # Tetapan mass assigment / fillable records
    protected $fillable = [
        'user_id',
        'asset_id',
        'tarikh_pinjam',
        'tarikh_pulang',
        'nota'
    ];
}
