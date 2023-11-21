@extends('admin.layouts.master')
@section('content')
    @php 
        $dataCustomers = \DB::select("SELECT * from users where usertype = '0'");  
        $dataRevenue = \DB::select("SELECT * from pesanans where status = '5' or status = '6'");
    @endphp
    <div class="row ">
        {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15"> Customers</h5>
                        <h2 class="mb-3 font-18">{{ count($dataCustomers) }}</h2>
                        <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="assets/img/banner/2.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Revenue</h5>
                        @foreach ($dataRevenue as $item)
                        <h2 class="mb-3 font-18">{{ $item->jumlah_harga }}</h2>
                        @endforeach
                        <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="assets/img/banner/4.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="margin:5%">
                    <h1>Hello, {{ Auth::user()->name }}</h1>
                </div>
                  <div class="card-body" style="border-top: 1px solid rgb(168, 166, 166)">
                      <p>You're logged in as an</p><span>Penjual</span>
                  </div>
            </div>
          </div>
    </div>
@endsection
