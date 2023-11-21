@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Detail Gambar
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
                    <a href="productimage/{{ $dataResultFile->bukti_pembayaran }}"   data-sub-html="Demo Description" >
                      <img style="max-width: 500px; max-height: 400px; center" class="img-responsive thumbnail" src="productimage/{{ $dataResultFile->bukti_pembayaran }}"
                        alt="{{ $dataResultFile->bukti_pembayaran }}">
                    </a>
                  </div>
                <div class="card-body">
                    <a href="{{ url('/order-details') }}"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection