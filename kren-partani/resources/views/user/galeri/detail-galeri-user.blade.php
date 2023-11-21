@extends('user.layouts.app')
@section('title')
    List Menu
@endsection
@section('content')
    <section class="main-article" id="article-1">
        @foreach ($galeri as $item)
            <h1 class="heading">{{ $galeri[0]->judul_galeri }}</h1>

            <section class="blog-parents">
                <div class="blog-container">

                    <div class="card">
                        <div
                            style=" max-height: 600px; display: block;
                margin-left: auto;
                margin-right: auto;: 600px; overflow:hidden">
                            <img src="{{ asset('/image//' . $galeri[0]->gambar) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">{{ $galeri[0]->judul_galeri }}</h1>
                            <p class="card-text">{{ $galeri[0]->deskripsi }}</p>
                        </div>
                    </div>
        @endforeach
        </div>
    </section>
@endsection
