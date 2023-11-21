@extends('user.layouts.app')
@section('title')
    History Detail Pemesanan
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/list-menu') }}">Menu</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pesanan') }}">Pesanan</a></li>
                            <li class="breadcrumb-item">History Detail Pemesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <div class="col-md-12">
                @if($historyPesanan->status == 1)
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Checkout pesanan anda berhasil</h3>
                            <h5>Selanjutnya silahkan lakukan pembayaran melalui:</h5>
                            <table class="table">
                                <tr>
                                    <th>No Rekening BRI atas nama RPL 004 BLU BPODT UN</th>
                                    <td><strong><b>0053-01-005665-03-3</b></strong></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pembayaran</th>
                                    <td><strong>Rp. {{ number_format($historyPesanan->jumlah_harga) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Kode pemesanan anda</th>
                                    <td><strong>{{ $historyPesanan->kode }}</strong></td>
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="card mt-2">
                    <div class="card-header">
                        <h4><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h4>
                        @if (!empty($historyPesanan))
                            <p class="text-end">Tanggal Pesan : {{ $historyPesanan->tanggal_pemesanan   }}</p>
                            @if($historyPesanan->status == 1)
                            <p class=" text-danger">Perhatian: </p>

                            <p class=" text-danger">1. Setelah melakukan pembayaran, silahkan upload bukti pembayaran dibawah ini</p>
                            <p class=" text-danger">2. Harap membayar sesuai dengan jumlah yang telah di tetapkan. Jika tidak sesuai dengan yang ditetapkan, maaf pemesanan anda akan di batalkan </p>

                            @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" >
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Jenis Tiket</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Alamat</th>
                                    <th style="width: 120px">Total Harga</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($historyDetailPesanan as $pesanan_detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ url('productimage') }}/{{ $pesanan_detail->tiket->gambar_tiket }}"
                                                style="width: 100px; height:100px;" class="card-img-top" alt="product image" />
                                        </td>
                                        <td>{{ $pesanan_detail->tiket->jenis_tiket }}</td>
                                        <td>{{ $pesanan_detail->jumlah }} buah</td>
                                        <td>Rp. {{ number_format($pesanan_detail->tiket->harga) }}</td>
                                        <td>{{ $pesanan_detail->pesanan->tanggal_tiket }}</td>
                                        <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end" colspan="5"><strong>Total Pesanan:</strong></td>
                                    <td><strong>Rp. {{ number_format($historyPesanan->jumlah_harga) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end" colspan="5"><strong>Kode Pesanan :</strong></td>
                                    <td><strong>{{ $historyPesanan->kode }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end" colspan="5"><strong>Total Pembayaran :</strong></td>
                                    <td><strong>Rp. {{ number_format($historyPesanan->jumlah_harga) }}</strong></td>
                                    @if($historyPesanan->status == 1 )
                                    <td><strong><a href="{{ url('/upload/'.$historyPesanan->id) }}"><button class="btn btn-secondary">Upload</button></a></strong></td>
                                    @else
                                    <td><strong><button class="btn btn-success" disabled><b>Finished</b></button></strong></td>

                                    @endif
                                </tr>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
