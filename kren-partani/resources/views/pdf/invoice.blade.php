{{-- @extends('admin.layouts.master')
@section('content') --}}
<div class="col-md-12">
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                </tr>
                {{-- <form action="{{ url('/confirm-photo-process/' . $data->id) }}" method="POST" --}}
                @foreach ($pesanan_details as $pesanan_detail)
                    <strong>
                        {{-- <h>Kode Pesanan: {{ $pesanan_detail->pesanan->kode }} <h> --}}
                    </strong>
                    <center>
                        <h>Tiket Masuk </h><br>
                        <h>The Kaldera Nomademic Escape</h><br>

                        <strong>
                            {{-- <h>{{ $pesanan_detail->tiket->jenis_tiket }}</h><br> --}}
                        </strong>
                        {{-- <h>Dapat digunakan <strong>{{ $pesanan_detail->jumlah }} orang</h></strong><br> --}}

                        {{-- <h4>Berlaku untuk satu orang satu kali masuk</h4> --}}
                        {{-- <h>pada tanggal: <strong> {{ $pesanan_detail->pesanan->tanggal_tiket }}</h></strong><br> --}}

                        <h>Peraturan Direktur Utama</h><br>
                        <h>Badan Pelaksanaan Otorita Danau Toba Nomor 1 Tahun 2021</h><br>
                        <h>Tentang</h><br>
                        <h>Pengenaan Tarif Layanan Badan Layanan Umum </h><br>
                        <h>Badan Pelaksanaan Otorita Danau Toba </h><br>
                    </center>
                @endforeach
                </table>
            </div>
        </div>
        {{-- @endsection --}}
