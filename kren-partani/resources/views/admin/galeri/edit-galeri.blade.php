@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('/edit-galeri', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('put') --}}
        <div class="form-group">
            <label for="judul_galeri">Judul </label>
            <input type="text" class="form-control" value="{{ old('judul_galeri', $galeri->judul_galeri) }}"
                id="judul_galeri" name="judul_galeri" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_galeri">Deskripsi</label>
            <textarea class="form-control" value="{{ old('deskripsi_galeri', $galeri->deskripsi_galeri) }}" id="deskripsi_galeri"
                name="deskripsi_galeri" rows="10" required>{{ $galeri->deskripsi_galeri }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar_galeri">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $galeri->gambar_galeri }}">
            @if ($galeri->gambar_galeri)
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img class="img-fluid mb-3 col-sm-5" id="preview" src="{{ url('/image/' . $galeri->gambar_galeri) }}">
                </div>
            @else
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img class="img-fluid mb-3 col-sm-5" id="preview">
                </div>
            @endif

            <input type="file" class="form-control" id="gambar_galeri" name="gambar_galeri" accept="image/*"
                onchange="previewImage(event)" required>

            @error('gambar_galeri')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('preview');
                    preview.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                var previewImg = document.getElementById('preview');
                var oldImageValue = "{{ $galeri->gambar_galeri }}";
                if (oldImageValue) {
                    previewImg.src = "{{ url('/image/') }}" + "/" + oldImageValue;
                }
            });
        
            function previewImage(event) {
                var input = event.target;
                var previewImg = document.getElementById('preview');
        
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    previewImg.src = '';
                }
            }
        </script>
    @endsection
