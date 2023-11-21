@extends('user.layouts.app')
@section('title')
    List Menu
@endsection
@section('content')
<style>
  .custom-margin {
    margin: 5px; /* Sesuaikan nilai margin yang diinginkan di sini */
  }
</style>
    <div class="container">
        <div class="row">
          {{-- <h3>Tiket</h3> --}}
          {{-- <hr></hr> --}}
          @foreach ($dataMenu as $tiket)
          <div class="card row-sm-4" style="border: 1px solid rgb(1, 1, 1); margin:5px; width:350px; height:auto;justify-content:center; align-items:center;">
              <div style="position:relative; width:300px; height:200px;">
                  <img src="{{ url('productimage') }}/{{ $tiket->gambar_tiket }}" class="card-img-top" alt="{{ $tiket->gambar_tiket }}" style=" width:100%; height:100%; object-fit:scale-down;"/>
              </div>
              <div class="card-body">
                  <h5 class="card-title">{{ $tiket->jenis_tiket }}</h5>
                  <p class="card-text">
                      <strong>Harga :</strong> Rp.{{ number_format($tiket->harga) }} <br>
                      <strong>Stok :</strong> {{ $tiket->stok }} <br>
                      <hr>
                      <h>Keterangan : {{ $tiket->keterangan }}</h> <br>
                  </p>
                  @if($tiket->stok <= 0)
                      <p class="text-danger">*Maaf, stok sudah habis.</p>
                      <a href="{{ url('pesan') }}/{{ $tiket->id }}" class="btn btn-secondaryw disabled"><i class="fas fa-shopping-cart"></i> Pesan</a>
                  @else
                      <a href="{{ url('pesan') }}/{{ $tiket->id }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
                  @endif
              </div>
          </div>
      @endforeach
      
        </div>
       


    </div>
    {{-- <div class="container ">
      <div class="row">
        <h3>Kamar</h3>
        <hr></hr>
          @foreach ($kamar as $kamar)
          <div class="card row-sm-4" style="border: 1px solid rgb(1, 1, 1); margin:5px; width:350px; height:auto;justify-content:center; align-items:center;">           
            <img src="{{ url('/image//' . $kamar ->gambar_kamar) }}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                <p class="card-text">
                  <strong>Status:</strong>
                  @if($kamar->status == 'Sudah di Booking')
                      <span style="color: red;">sudah di booking</span>
                  @else
                      {{ $kamar->status }}
                  @endif
                  <hr>                  
                  <p>Deskripsi : {{ Str::limit($kamar->deskripsi,50)  }}</p> <br>
                </p>
                    <div>
                  <a href="/detail-kamar-user/{{$kamar->id_kamar}}" >
                      <button type="submit" class="btn btn-primary custom-margin">
                          <span class="button_text-sub"> Selengkapnya</span>
                          <span class="button_icon-sub">
                              <i class="fa fa-solid fa-circle-right"></i>
                          </span>
                      </button>  
              </a>
                <a href="https://api.whatsapp.com/send?phone={{$kamar->nomor_telepon}}" target="_blank">
                  <button class="fab fa-whatsapp btn btn-primary"> pesan 
                </button>
              </a>
                
              </div>
          </div>
          </div>
          @endforeach --}}
          
@endsection
