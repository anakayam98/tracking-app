@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Edit Detail Servis</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('detailservis.update', $detailServis->id_detail_servis) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Kode Tracking</label>
                <input type="number" name="kode_Tracking" class="form-control" value="{{ old('kode_Tracking', $detailServis->kode_Tracking) }}">
            </div>
            <div class="form-group">
                <label>Barang</label>
                <select name="id_barang" class="form-control">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ old('id_barang', $detailServis->id_barang) == $barang->id ? 'selected' : '' }}>{{ $barang->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jasa</label>
                <select name="id_jasa" class="form-control">
                    <option value="">-- Pilih Jasa --</option>
                    @foreach($jasas as $jasa)
                        <option value="{{ $jasa->id }}" {{ old('id_jasa', $detailServis->id_jasa) == $jasa->id ? 'selected' : '' }}>{{ $jasa->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Servis</label>
                <select name="id_servis" class="form-control" required>
                    <option value="">-- Pilih Servis --</option>
                    @foreach($servis as $srv)
                        <option value="{{ $srv->id }}" {{ old('id_servis', $detailServis->id_servis) == $srv->id ? 'selected' : '' }}>{{ $srv->no_nota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Pelanggan</label>
                <select name="id_pelanggan" class="form-control">
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" {{ old('id_pelanggan', $detailServis->id_pelanggan) == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga', $detailServis->harga) }}">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $detailServis->jumlah) }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Menunggu Separepart" {{ old('status', $detailServis->status) == 'Menunggu Separepart' ? 'selected' : '' }}>Menunggu Separepart</option>
                    <option value="Sedang Diproses" {{ old('status', $detailServis->status) == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                    <option value="Sudah Selesai" {{ old('status', $detailServis->status) == 'Sudah Selesai' ? 'selected' : '' }}>Sudah Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tgl Servis Mulai</label>
                <input type="date" name="tgl_servis_mulai" class="form-control" value="{{ old('tgl_servis_mulai', $detailServis->tgl_servis_mulai) }}">
            </div>
            <div class="form-group">
                <label>Tgl Servis Selesai</label>
                <input type="date" name="tgl_servis_selesai" class="form-control" value="{{ old('tgl_servis_selesai', $detailServis->tgl_servis_selesai) }}">
            </div>
            <div class="form-group">
                <label>Bukti</label>
                <textarea name="bukti" class="form-control">{{ old('bukti', $detailServis->bukti) }}</textarea>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea name="catatan" class="form-control">{{ old('catatan', $detailServis->catatan) }}</textarea>
            </div>
            <a href="{{ route('detailservis.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
