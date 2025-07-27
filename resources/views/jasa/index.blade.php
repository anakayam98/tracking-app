@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Tabel Jasa</h6>
        <a href="{{ route('jasa.create') }}" class="btn btn-sm btn-light">+ Tambah Jasa</a>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <form action="{{ route('jasa.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari jasa..." value="{{ request('search') }}">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
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
                    @foreach($jasas as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Aksi" style="gap: 5px;">
                                    <a href="{{ route('jasa.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('jasa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($jasas->isEmpty())
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
