<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    # Maklumat table yang perlu dihubungi
    protected $table = 'assets';

    # Setkan fillable / mass assignment
    protected $fillable = [
        'nama',
        'barcode',
        'harga_pasaran',
        'jenama',
        'jenis',
        'tarikh_beli'
    ];

    # Hubungan table assets dan tablet tempahan
    public function showTempahan()
    {
        # has many relations dan sort by desc
        return $this->hasMany(Tempahan::class, 'asset_id')
        ->orderBy('created_at', 'desc');
    }
}
