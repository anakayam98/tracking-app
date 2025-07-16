@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tambah Servis</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('servis.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>No nota</label>
                <input type="text" name="no_nota" class="form-control" value="{{ old('no_nota', $no_nota ?? '') }}" required readonly>
            </div>

            <div class="form-group">
                <label>Tgl servis</label>
                <input type="date" name="tgl_servis" id="tgl_servis" class="form-control" value="{{ old('tgl_servis') }}" required>
            </div>


            <div class="form-group">
                <label>Nama Pelanggan</label>
                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" 
                            data-nama="{{ $pelanggan->nama }}"
                            data-no_hp="{{ $pelanggan->no_hp }}"
                            data-email="{{ $pelanggan->email }}"
                            data-alamat="{{ $pelanggan->alamat }}"
                            {{ old('id_pelanggan') == $pelanggan->id ? 'selected' : '' }}
                        >{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div id="detail-pelanggan" style="display:none;" class="mb-3">
                <div class="alert alert-info">
                    <strong>No HP:</strong> <span id="dp_no_hp"></span><br>
                    <strong>Email:</strong> <span id="dp_email"></span><br>
                    <strong>Alamat:</strong> <span id="dp_alamat"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Unit</label>
                <input type="text" name="unit" class="form-control" value="{{ old('unit') }}" required>
            </div>

            <div class="form-group">
                <label>No seri</label>
                <input type="text" name="no_seri" class="form-control" value="{{ old('no_seri') }}" required>
            </div>

            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" name="keluhan" class="form-control" value="{{ old('keluhan') }}" required>
            </div>

            <div class="form-group">
                <label>Kelengkapan</label>
                <input type="text" name="kelengkapan" class="form-control" value="{{ old('kelengkapan') }}" required>
            </div>

            <div class="form-group">
                <label>Pin/pascode</label>
                <input type="text" name="pin_passcode" class="form-control" value="{{ old('pin_passcode') }}" required>
            </div>

            <div class="form-group">
                <label>Estimasi biaya</label>
                <input type="text" name="estimasi_biaya" class="form-control" value="{{ old('estimasi_biaya') }}" required>
            </div>

            <a href="{{ route('servis.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@push('js')
<script>
    const selectPelanggan = document.getElementById('id_pelanggan');
    const detailDiv = document.getElementById('detail-pelanggan');
    const dpNama = document.getElementById('dp_nama');
    const dpNoHp = document.getElementById('dp_no_hp');
    const dpEmail = document.getElementById('dp_email');
    const dpAlamat = document.getElementById('dp_alamat');

    selectPelanggan.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        if (this.value) {
            dpNoHp.textContent = selected.getAttribute('data-no_hp');
            dpEmail.textContent = selected.getAttribute('data-email');
            dpAlamat.textContent = selected.getAttribute('data-alamat');
            detailDiv.style.display = 'block';
        } else {
            detailDiv.style.display = 'none';
        }
    });

    // Tampilkan detail jika sudah terpilih (untuk edit/old value)
    window.addEventListener('DOMContentLoaded', function() {
        if(selectPelanggan.value) {
            const selected = selectPelanggan.options[selectPelanggan.selectedIndex];
            dpNoHp.textContent = selected.getAttribute('data-no_hp');
            dpEmail.textContent = selected.getAttribute('data-email');
            dpAlamat.textContent = selected.getAttribute('data-alamat');
            detailDiv.style.display = 'block';
        }
    });
</script>
@endpush
        </form>
    </div>
</div>
        </form>
    </div>
</div>
@endsection
