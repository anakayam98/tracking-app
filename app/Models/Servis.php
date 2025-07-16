<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nota',
        'tgl_servis',
        'id_pelanggan',
        'unit',
        'no_seri',
        'keluhan',
        'kelengkapan',
        'pin_passcode',
        'estimasi_biaya',
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }
}
