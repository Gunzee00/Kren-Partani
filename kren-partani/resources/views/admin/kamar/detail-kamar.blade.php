@extends('admin.layouts.master')
@section('content')
<div class="card">
    <img src="{{ asset('image/' . $kamar->gambar_kamar) }}" class="card-img-top" alt="..." style="max-width: 300px; max-height: 400px; center">

    <div class="card-body">
        <h5 class="card-title">{{ $kamar->nama_kamar }}</h5><p class="card-text">{{ $kamar->status }}</p>   
        <p class="card-text">{{ $kamar->deskripsi }}</p>
        
        <a href="/show-kamar" class="btn btn-primary btn-block btn-sm">kembali</a>
    </div>
</div>
@endsection