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
        <a href="/admin/buku/tambah" class="btn btn-primary px-4 mb-3">Tambah Data</a>
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
                                        <th>Penulis</th>
                                        <th>ISBN</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($buku->isEmpty())
                                        <tr>
                                            <td colspan="20" class="text-center">Tidak ada data ditemukan.</td>
                                        </tr>
                                    @else
                                        @foreach ($buku as $data)
                                            <tr>
                                                <td>{{ $loop->iteration + ($buku->currentPage() - 1) * $buku->perPage() }}
                                                </td>
                                                <td>{{ $data->judul }} </td>
                                                <td>{{ $data->penulis }} </td>
                                                <td>{{ $data->isbn }} </td>
                                                <td>{{ $data->kategori->nama }} </td>
                                                <td>{{ $data->stok }} </td>
                                                <td>{{ $data->penerbit }} </td>
                                                <td>{{ $data->tahun_terbit }} </td>
                                                <td><a target="_blank" href="/{{ $data->gambar }}"><img class="img-fluid"
                                                            width="100" src="/{{ $data->gambar }}" alt="Foto Cover"></a>
                                                </td>
                                                <td>{{ $data->deskripsi }} </td>
                                                <td>{{ $data->status }} </td>
                                                <td class="d-flex order-actions">
                                                    <a href="/admin/buku/{{ $data->id }}/edit" class=""><i
                                                            class='bx bxs-edit'></i></a>
                                                    <form action="/admin/buku/{{ $data->id }}/delete"
                                                        method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="border-0"
                                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i
                                                                class='bx bxs-trash' style="font-size: 19px;"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>ISBN</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="mt-3">
                                {{ $buku->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
