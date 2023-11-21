@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div style="max-height: 600px; overflow:hidden">
            <img src="{{ asset('/image//' . $artikel[0]->gambar) }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $artikel[0]->judul_artikel }}</h1>
            <p class="card-text">{{ $artikel[0]->deskripsi }}</p>
            <a href="/show-artikel" class="btn btn-primary btn-block btn-sm">kembali</a>
        </div>
    </div>
@endsection
