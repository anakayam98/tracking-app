@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tabel Pelanggan</h6>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-light">+ Tambah pelanggan</a>
    </div>

<div class="card-body">
    <div class="d-flex justify-content-end mb-2">
    <form action="{{ route('pelanggan.index') }}" method="GET" class="form-inline">
        <div class="input-group input-group-sm" style="width: 250px;">
            <input type="text" name="search" class="form-control" placeholder="Cari pelanggan..." value="{{ request('search') }}">
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
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
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
                    @foreach($pelanggans as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Aksi" style="gap: 5px;">
                                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($pelanggans->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Data belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
