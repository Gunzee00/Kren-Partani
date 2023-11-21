@extends('admin.layouts.master')
@section('content')
<div class="section-body">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Gallery Anda</h4>
        </div>
        <a href="{{ url('add-gallery') }}"><button type="button" style="margin-left: 29px" class="btn btn-primary">Tambah</button></a>
          <div class="card-body">
              <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                  @foreach ($gallerys as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a href="gallery/{{ $item->img }}" data-sub-html="Demo Description">
                        <img class="img-responsive thumbnail" src="gallery/{{ $item->img }}" height="150px;" alt="">
                    </a>
                    <a href="{{ url('/update-gallery/'.$item->id) }}" ><i class="fas fa-pen"></i></a>
                    <a href="{{ url('/delete-gallery/'.$item->id) }}" ><i class="fas fa-trash"></i></a>
                    <p class="text-center"><b>{{ $item->title }}</b></p>
                    </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection