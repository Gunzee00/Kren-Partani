@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('/add-artikel', $artikel->id_artikel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="judul_artikel">Judul Artikel</label>
            <input type="text" class="form-control" value="{{ old('judul_artikel', $artikel->judul_artikel) }}"
                id="judul_artikel" name="judul_artikel" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" required>{{ $artikel->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="hidden" name="oldImage" value="{{ $artikel->gambar }}">
            @if ($artikel->gambar)
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img class="img-fluid mb-3 col-sm-5" id="preview" src="{{ url('/image/' . $artikel->gambar) }}">
                </div>
            @else
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img class="img-fluid mb-3 col-sm-5" id="preview">
                </div>
            @endif

            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*"
                onchange="previewImage(event)" required>

            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>

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
            var oldImageValue = "{{ $artikel->gambar }}";
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
