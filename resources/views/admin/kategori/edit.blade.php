@extends('admin.layouts.main')

@section('container')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $subtitle }}</div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="g-3" method="post" action="{{ route('edit.kategori', $kategori->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control"
                                    name="nama" id="nama" value="{{ $kategori->nama,old('nama') }}" autofocus>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">{{ $kategori->deskripsi }}</textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Edit</button>
                                    <a href="/admin/kategori" class="btn btn-light px-4">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
