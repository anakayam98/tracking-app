@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tabel Servis</h6>
        <a href="{{ route('servis.create') }}" class="btn btn-sm btn-light">+ Tambah Servis</a>    
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <form action="{{ route('servis.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari servis..." value="{{ request('search') }}">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>No Nota</th>
                        <th>Tanggal Servis</th>
                        <th>Nama Pelanggan</th>
                        {{-- <th>No Hp</th>
                        <th>Email</th>
                        <th>Alamat</th> --}}
                        <th>Unit</th>
                        <th>No Seri</th>
                        <th>Keluhan</th>
                        {{-- <th>Kelengkapan</th>
                        <th>Pin/Passcode</th> --}}
                        <th>Estimasi Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- SweetAlert2 -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    @if(session('success'))
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: '{{ session("success") }}',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    @endif
                </script>
                <tbody>
                    @foreach($servis as $item)
                        <tr>
                            <td>{{ $item->no_nota }}</td>
                            <td>{{ $item->tgl_servis }}</td>
                            <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                            {{-- <td>{{ $item->pelanggan->no_hp ?? '-' }}</td>
                            <td>{{ $item->pelanggan->email ?? '-' }}</td>
                            <td>{{ $item->pelanggan->alamat ?? '-' }}</td> --}}
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->no_seri }}</td>
                            <td>{{ $item->keluhan }}</td>
                            {{-- <td>{{ $item->kelengkapan }}</td>
                            <td>{{ $item->pin_passcode }}</td> --}}
                            <td>{{ number_format($item->estimasi_biaya, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="d-flex" role="group" aria-label="Aksi" style="gap: 5px;">
                                    <a href="{{ route('servis.show', $item->id) }}" class="btn btn-sm btn-info ms-3" title="Lihat"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('servis.edit', $item->id) }}" class="btn btn-sm btn-warning ms-3" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('servis.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($servis->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center text-muted">Data belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
