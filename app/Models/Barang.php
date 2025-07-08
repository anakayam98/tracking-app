<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau nama model == nama tabel jamak)
    protected $table = 'barangs';

    // Kolom-kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'nama',
        'harga_beli',
        'harga_jual',
        'keterangan',
    ];
}
