@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tabel Barang</h6>
        <a href="{{ route('barang.create') }}" class="btn btn-sm btn-light">+ Tambah Barang</a>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <form action="{{ route('barang.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari barang..." value="{{ request('search') }}">
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
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $index => $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($barangs->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Data belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
