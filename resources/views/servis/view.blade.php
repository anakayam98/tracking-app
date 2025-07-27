@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-info text-white">
        <h6 class="m-0 font-weight-bold">Detail Servis</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No Nota</th>
                <td>{{ $servis->no_nota }}</td>
            </tr>
            <tr>
                <th>Tanggal Servis</th>
                <td>{{ $servis->tgl_servis }}</td>
            </tr>
            <tr>
                <th>Nama Pelanggan</th>
                <td>{{ $servis->pelanggan->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $servis->pelanggan->no_hp ?? '-' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $servis->pelanggan->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $servis->pelanggan->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit</th>
                <td>{{ $servis->unit }}</td>
            </tr>
            <tr>
                <th>No Seri</th>
                <td>{{ $servis->no_seri }}</td>
            </tr>
            <tr>
                <th>Keluhan</th>
                <td>{{ $servis->keluhan }}</td>
            </tr>
            <tr>
                <th>Kelengkapan</th>
                <td>{{ $servis->kelengkapan }}</td>
            </tr>
            <tr>
                <th>Pin/Passcode</th>
                <td>{{ $servis->pin_passcode }}</td>
            </tr>
            <tr>
                <th>Estimasi Biaya</th>
                <td>{{ number_format($servis->estimasi_biaya, 0, ',', '.') }}</td>
            </tr>
        </table>
        <a href="{{ route('servis.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
