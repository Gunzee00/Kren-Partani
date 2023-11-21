@extends('user.layouts.app')
@section('title')
    Agen & Pelayan
@endsection
@section('content')
    <section class="p-4 text-center w-100">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($data as $agen)
                <div class="col">
                    <div class="card h-100">
                        <img src="agenimage/{{ $agen->image }}" class="card-img-top" alt="product image" height="400px" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $agen->name }}</h5>
                            <p class="card-text">{{ $agen->speciality }}</p>
                            <div class="container">
                                <!-- Facebook -->
                                <a href="{{ $agen->facebook }}" target="_blank" class="btn btn-primary btn-floating m-1"
                                    style="background-color: #3b5998;" href="#!" role="button"><i
                                        class="fab fa-facebook-f"></i></a>

                                <!-- Instagram -->
                                <a href="{{ $agen->instagram }}" target="_blank" class="btn btn-primary btn-floating m-1"
                                    style="background-color: #ac2bac;" href="#!" role="button"><i
                                        class="fab fa-instagram"></i></a>


                                <!-- Whatsapp -->
                                <a href="{{ $agen->twitter }}" target="_blank" class="btn btn-primary btn-floating m-1"
                                    style="background-color: #55acee;" href="#!" role="button"><i
                                        class="fab fa-whatsapp"></i></i></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Update terakhir {{ $agen->updated_at }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
