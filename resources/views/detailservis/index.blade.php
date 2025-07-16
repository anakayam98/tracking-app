@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tabel Detail Servis</h6>
        <a href="{{ route('detailservis.create') }}" class="btn btn-sm btn-light">+ Tambah Detail Servis</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-2">
            <form action="{{ route('detailservis.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Kode Tracking</th>
                        <th>Barang</th>
                        <th>Jasa</th>
                        <th>Servis</th>
                        <th>Pelanggan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $item)
                        <tr>
                            <td>{{ $item->kode_Tracking }}</td>
                            <td>{{ $item->barang->nama ?? '-' }}</td>
                            <td>{{ $item->jasa->nama ?? '-' }}</td>
                            <td>{{ $item->servis->no_nota ?? '-' }}</td>
                            <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->tgl_servis_mulai }}</td>
                            <td>{{ $item->tgl_servis_selesai }}</td>
                            <td class="text-center">
                                <a href="{{ route('detailservis.edit', $item->id_detail_servis) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('detailservis.destroy', $item->id_detail_servis) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($details->isEmpty())
                        <tr>
                            <td colspan="13" class="text-center text-muted">Data belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
