@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambahkan Data About Us dari Deba Store</h4>
                        <form action="{{ url('/edit-aboutus-process/'.$dataAboutUsUpdate->id) }}" method="post" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="judul" class="form-control" @error('judul') is-invalid @enderror placeholder="Judul Artikel" value="{{ $dataAboutUsUpdate->judul }}">
                                @error('judul')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="deskripsi" id="deskripsi" cols="100%" rows="15" class="form-control" value="{{ $dataAboutUsUpdate->deskripsi }}" placeholder="Deskripsi"></textarea>
                                @error('deskripsi')
                                    <div class="text-danger" >
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" name="gambar" value="{{ $dataAboutUsUpdate->gambar }}">
                                <img src="aboutusimage/{{ $dataAboutUsUpdate->gambar }}" alt="{{ $dataAboutUsUpdate->gambar }}" style="width: 100px; height:100px;border-radius:10px;"  >
                                @error('gambar')
                                    <div class="text-danger" >
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="/aboutus"><button type="button" class="btn btn-dark btn-icon-text" value="Save"><i class="mdi mdi-plus-box"></i> Kembali</button></a>
                            <button type="submit" class="btn btn-primary btn-icon-text" value="Save"><i class="mdi mdi-plus-box"></i> Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
