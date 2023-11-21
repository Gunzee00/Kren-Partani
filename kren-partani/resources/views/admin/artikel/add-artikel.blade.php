{{-- @extends('admin.layouts.master')
@section('content') --}}

@extends('admin.layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h1>Tambah Artikel</h1>

                <form action="{{ url('/artikel') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="judul_artikel">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
