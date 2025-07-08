@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tambah Barang</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="text" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}" required>
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="text" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" required>{{ old('keterangan') }}</textarea>
            </div>

            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
