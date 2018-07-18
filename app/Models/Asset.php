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
}
