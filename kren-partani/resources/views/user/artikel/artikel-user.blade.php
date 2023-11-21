@extends('user.layouts.app')
@section('title')
    List Menu
@endsection
@section('content')
   <div class="container">
    <div class="row">
    
            @foreach ($artikel as $item)
            <div class="card row-sm-4" style="border: 1px solid rgb(0, 0, 0); margin:5px; width:350px; height:auto;justify-content:center; align-items:center;">

                <div class="blog-box">
                    <div >
                        
                        <img src="{{ url('/image//' . $item->gambar)  }}" style="width:330px; height:230px;">
                    </div>
                    <div class="card-body">
                    
                        {{-- <span class="blog-text-title">{{ $item->tanggal_rilis }}</span> --}}
                        <a href="/user-detail-artikel/{{ $item->id_artikel }}"d class="blog-title">{{ $item->judul_artikel }}</a>
                        <p>{{ Str::limit($item->deskripsi, 20) }}</p>
                        <a href="/user-detail-artikel/{{ $item->id_artikel }}">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <span class="button_text-sub"> Selengkapnya</span>
                                    <span class="button_icon-sub">
                                        <i class="fa fa-solid fa-circle-right"></i>
                                    </span>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
        {{ $artikel->links() }}
        </div>
        
@endsection
