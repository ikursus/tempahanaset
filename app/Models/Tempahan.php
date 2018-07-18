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

    public function dataPengguna()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dataAsset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
