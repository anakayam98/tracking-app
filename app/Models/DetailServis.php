<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detail_servis';

    protected $fillable = [
        'kode_Tracking',
        'id_barang',
        'id_jasa',
        'id_servis',
        'id_pelanggan',
        'harga',
        'jumlah',
        'status',
        'tgl_servis_mulai',
        'tgl_servis_selesai',
        'bukti',
        'catatan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'id_jasa');
    }
    public function servis()
    {
        return $this->belongsTo(Servis::class, 'id_servis');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
