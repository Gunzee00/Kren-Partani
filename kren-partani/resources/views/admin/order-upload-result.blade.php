@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Detail Gambar
                </div>
                <div>
                    <img src="productimage/{{ $orderResultUpload->gambar }}" alt="{{ $orderResultUpload->gambar }}" width="500px" height="500px">
                </div>
                <div class="card-body">
                    <a href="{{ url('/order-finish') }}"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection