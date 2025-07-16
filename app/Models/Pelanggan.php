<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    // Kolom-kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',
    ];

    }
