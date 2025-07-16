@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-warning text-white">
        <h6 class="m-0 font-weight-bold">Edit Servis</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('servis.update', $servis) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>No Nota</label>
                <input type="text" name="no_nota" class="form-control" value="{{ old('no_nota', $servis->no_nota) }}" required readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Servis</label>
                <input type="date" name="tgl_servis" class="form-control" value="{{ old('tgl_servis', $servis->tgl_servis) }}" required readonly>
            </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <select name="id_pelanggan" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $p)
                        <option value="{{ $p->id }}" {{ old('id_pelanggan', $servis->id_pelanggan) == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Unit</label>
                <input type="text" name="unit" class="form-control" value="{{ old('unit', $servis->unit) }}" required>
            </div>
            <div class="form-group">
                <label>No Seri</label>
                <input type="text" name="no_seri" class="form-control" value="{{ old('no_seri', $servis->no_seri) }}" required>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" name="keluhan" class="form-control" value="{{ old('keluhan', $servis->keluhan) }}" required>
            </div>
            <div class="form-group">
                <label>Kelengkapan</label>
                <input type="text" name="kelengkapan" class="form-control" value="{{ old('kelengkapan', $servis->kelengkapan) }}" required>
            </div>
            <div class="form-group">
                <label>Pin/Passcode</label>
                <input type="text" name="pin_passcode" class="form-control" value="{{ old('pin_passcode', $servis->pin_passcode) }}">
            </div>
            <div class="form-group">
                <label>Estimasi Biaya</label>
                <input type="number" name="estimasi_biaya" class="form-control" value="{{ old('estimasi_biaya', $servis->estimasi_biaya) }}">
            </div>
            <a href="{{ route('servis.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection
