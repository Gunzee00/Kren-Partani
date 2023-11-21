@extends('user.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
        <div class="login-brand">
          Debastore
        </div>
        <div class="card card-primary">
          <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-5 p-0">
              <div class="card-header text-center">
                <h4>Hubungi Kami</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ url('/hubungi-kami') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group floating-addon">
                    <label>Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-user"></i>
                        </div>
                      </div>
                      <input id="name" type="text" class="form-control" name="nama" autofocus placeholder="Name">
                    </div>
                    @error('nama')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group floating-addon">
                    <label>Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </div>
                      </div>
                      <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    @error('email')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" placeholder="Type your message" style="resize: none;" rows="5" name="message"></textarea>
                    @error('message')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                    @enderror   
                    </div>
                  <div class="form-group text-right pt-4">
                    <button type="submit" class="btn btn-round btn-lg btn-primary">
                      Send Message
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7 p-0">
              <div>
                <img src="img/db.png" alt="" style="width: 100%;" height="100%;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection