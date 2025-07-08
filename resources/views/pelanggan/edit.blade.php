@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-warning text-white">
        <h6 class="m-0 font-weight-bold">Edit Pelanggan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $pelanggan->nama) }}" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-Laki" {{ $pelanggan->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ $pelanggan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $pelanggan->email) }}" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection
