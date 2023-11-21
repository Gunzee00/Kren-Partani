@extends('user.layouts.app')
@section('title')
    Article
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($aboutUsUser as $aboutus)
                <div class="card col-sm-12">
                    <strong>{{ $aboutus->judul }}</strong><br>
                    <img src="{{ url('aboutusimage') }}/{{ $aboutus->gambar }}" style="width:auto; height:600px;"
                        class="card-img-top" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $aboutus->nama_barang }}</h5>
                        <p class="card-text">
                            <p>{{ $aboutus->deskripsi }}</p><br>
                            <hr>
                            <i>{{ $aboutus->updated_at }}</i>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
