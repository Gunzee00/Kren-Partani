@extends('user.layouts.app')
@section('title')
    Gallery
@endsection
@section('content')
<div class="section-body">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Gallery <span>DEBASTORE</span></h4>
          </div>
          <div class="card-body">
            <div id="aniimated-thumbnials" class="list-unstyled row clearfix" style="text-align: center; justify-content:center; align-items:center">
              @foreach ($dataGallery as $item)
                <div class="col-md-3">
                  <a href="gallery/{{ $item->img }}" data-sub-html="Demo Description">
                    <img class="img-responsive thumbnail" src="gallery/{{ $item->img }}" width="320px;" height="200px;" alt="gallery/{{ $item->img }}">
                  </a>
                  <p class="text-center">{{ $item->title }}</p>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection