@extends('admin.layouts.main')

@section('container')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $subtitle }}</div>
            {{-- <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div> --}}
        </div>

        <!--end breadcrumb-->
        @if (session()->has('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        <hr />
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Rencana Kembali</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($peminjaman->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
                                        </tr>
                                    @else
                                        @foreach ($peminjaman as $data)
                                            <tr>
                                                <td>{{ $loop->iteration + ($peminjaman->currentPage() - 1) * $peminjaman->perPage() }}
                                                </td>
                                                <td>{{ $data->buku->judul }}</td>
                                                <td>{{ $data->anggota->nama }}</td>
                                                <td>{{ $data->tanggal_pinjam }}</td>
                                                <td>{{ $data->tanggal_rencana_pengembalian }}</td>
                                                @if ($data->tanggal_kembali)
                                                    <td>{{ $data->tanggal_kembali }}</td>
                                                @else
                                                    <td><span class="badge bg-danger">Buku belum dikembalikan</span>
                                                    </td>
                                                @endif
                                                @if ($data->status == 'dipinjam')
                                                    <td><span class="badge bg-warning">Dipinjam</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Dikembalikan</span></td>
                                                @endif
                                                <td class="d-flex order-actions">
                                                    @if ($data->status == 'dipinjam')
                                                        <button class="border-0" type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#returnModal{{ $data->id }}">
                                                            <i class='bx bx-caret-left-circle' style="font-size: 20px;"></i>
                                                        </button>
                                                    @endif
                                                    @if ($data->status == 'dikembalikan')
                                                        <form action="/admin/pengembalian/{{ $data->id }}/delete"
                                                            method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="border-0"
                                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i
                                                                    class='bx bxs-trash'
                                                                    style="font-size: 19px;"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="returnModal{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="returnModalLabel{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="returnModalLabel{{ $data->id }}">Konfirmasi
                                                                Pengembalian Buku</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="/admin/pengembalian/{{ $data->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <p>Apakah Anda yakin ingin mengembalikan buku
                                                                    <strong>{{ $data->buku->judul }}</strong>?
                                                                </p>
                                                                <div class="mb-3">
                                                                    <label for="tanggal_kembali" class="form-label">Tanggal
                                                                        Pengembalian</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_kembali" name="tanggal_kembali"
                                                                        value="{{ date('Y-m-d') }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Konfirmasi
                                                                    Pengembalian</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Rencana Kembali</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="mt-3">
                                {{ $peminjaman->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
