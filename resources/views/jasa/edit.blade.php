@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-warning text-white">
        <h6 class="m-0 font-weight-bold">Edit Jasa</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('jasa.update', $jasa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $jasa->nama) }}" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ old('harga', $jasa->harga) }}" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" required>{{ old('keterangan', $jasa->keterangan) }}</textarea>
            </div>

            <a href="{{ route('jasa.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection
