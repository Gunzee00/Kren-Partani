@extends('user.layouts.app')
@section('title')
    List Menu
@endsection
@section('content')
<div class="container">
    <div class="row">
    
            @foreach ($galeri as $item)
            <div class="card row-sm-4" style="border: 1px solid rgb(0, 0, 0); margin:5px; width:350px; height:auto;justify-content:center; align-items:center;">

                <div class="blog-box">
                    <div>
                        <a href="{{ url('/image/' . $item->gambar_galeri) }}" data-lightbox="image-gallery">
                            <img src="{{ url('/image/' . $item->gambar_galeri) }}" style="width:330px; height:230px;">
                        </a>
                    </div>
                    
                    <div class="card-body">
                        {{-- <span class="blog-text-title">{{ $item->tanggal_rilis }}</span> --}}
                        <h href="#" class="blog-title">{{ $item->judul_galeri }}</h>
                        <p>{{ Str::limit($item->deskripsi, 20) }}</p>
                        <a href="/user-detail-galeri/{{ $item->id_galeri }}">
                            <div>
                                {{-- <button type="submit" class="button-sub">
                                    <span class="button_text-sub"> Selengkapnya</span>
                                    <span class="button_icon-sub">
                                        <i class="fa fa-solid fa-circle-right"></i>
                                    </span>
                                </button> --}}
                            </div>
                        </a>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
        {{ $galeri->links() }}
        </div>
        <script src="path/to/lightbox.js"></script>
@endsection
