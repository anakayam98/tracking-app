<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau nama model == nama tabel jamak)
    protected $table = 'pelanggans';

    // Kolom-kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',
    ];
}
