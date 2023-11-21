@extends('admin.layouts.master')
@section('content')
<div class="card">
    {{-- <img src="{{ asset('image/' . $galeri->gambar_galeri) }}" class="card-img-top" alt="..." style="max-width: 300px; max-height: 200px;"> --}}
    <img src="{{ asset('image/' . $galeri->gambar_galeri) }}" class="card-img-top" alt="..." style="max-width: 300px; max-height: 400px; center">

    <div class="card-body">
        <h5 class="card-title">{{ $galeri->judul_galeri }}</h5>
        <p class="card-text">{{ $galeri->deskripsi_galeri }}</p>
        <a href="/show-galeri" class="btn btn-primary btn-block btn-sm">kembali</a>
    </div>
</div>
@endsection
