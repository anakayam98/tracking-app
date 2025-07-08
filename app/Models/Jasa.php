<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'jasas';

    // Kolom-kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'nama',
        'harga',
        'keterangan',
    ];
}
