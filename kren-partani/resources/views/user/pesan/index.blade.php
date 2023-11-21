@extends('user.layouts.app')
@section('title')
    Pesan Menu
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('list-menu') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('list-menu') }}">Menu</a></li>
                            <li class="breadcrumb-item">Check Out</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ url('productimage') }}/{{ $tiket->gambar_tiket }}" width="445px" alt="">
                            </div>
                            <div class="col-md-6 mt-4">
                                <h3>{{ $tiket->jenis_tiket }}</h3>
                                <table class="table table-borderless">
                                    <form action="{{ url('/pesan-process/' . $tiket->id) }}" method="POST">
                                        <tr>
                                            <input type="text" hidden name="jenis_tiket"
                                                value="{{ $tiket->jenis_tiket }}">
                                            <input  type="file" hidden name="gambar"
                                                value="{{ url('productimage') }}/{{ $tiket->gambar }}" id="">
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($tiket->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ $tiket->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $tiket->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pemesanan Tiket</td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" name="tanggal_tiket" id="" class="form-control" required
                                                    value="{{ old('tanggal_tiket') }}" min="{{ date('Y-m-d') }}"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                @csrf
                                                <input type="number" name="jumlah_pesan" class="form-control" required
                                                    min="1" value="{{ old('jumlah_pesan') }}">
                                                <button type="submit" class="btn btn-primary mt-2"><i
                                                        class="fas fa-shopping-cart"></i> Tambahkan Ke keranjang </button>

                                            </td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
