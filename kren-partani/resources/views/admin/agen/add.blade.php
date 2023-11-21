@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Agen</h4>
                </div>
                <form action="{{ url('/uploadagen') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Agen / Pelayan</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" name="speciality" class="form-control" value="{{ old('speciality') }}" required >
                            @error('speciality')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="section-title mt-0">Masukkan link sosial media NB : (jika tidak ada beri tanda "-")
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}" required >
                            @error('facebook')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}" required >
                            @error('instagram')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="number" name="twitter" class="form-control" value="{{ old('twitter') }}" required min="10">
                            @error('twitter')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="section-title">Masukkan foto Agen / Pelayan</div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" value="{{ old('image') }}" required>
                            <label class="custom-file-label" for="imageprofile">Choose image</label>
                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-icon icon-left btn-info" value="Save"><i
                                class="fas fa-user-plus"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
