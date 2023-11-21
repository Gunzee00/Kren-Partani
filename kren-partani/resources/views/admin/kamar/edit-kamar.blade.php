@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('/edit-kamar', $kamar->id_kamar) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('put') --}}
        <div class="form-group">
            <label for="nama_kamar">Nama Kamar </label>
            <input type="text" class="form-control" value="{{ old('nama_kamar', $kamar->nama_kamar) }}" id="nama_kamar"
                name="nama_kamar" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" value="{{ old('deskripsi', $kamar->deskripsi) }}" id="deskripsi" name="deskripsi"
                rows="10" required>{{ $kamar->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar_kamar">Gambar</label>
            <input type="hidden" name="gambar_kamar" value="{{ $kamar->gambar_kamar }}">
            @if ($kamar->gambar_kamar)
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img value="{{ $kamar->gambar_kamar }}" class="img-fluid mb-3 col-sm-5" id="preview" src="{{ url('/image/' . $kamar->gambar_kamar) }}">
                </div>
            @else
                <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                    <img value="{{ $kamar->gambar_kamar }}" class="img-fluid mb-3 col-sm-5" id="preview">
                </div>
            @endif

                <input type="file" class="form-control"  id="gambar_kamar" name="gambar_kamar" accept="image/*"
                    onchange="previewImage(event)" required>

                @error('gambar_kamar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telpon </label>
            <input type="text" class="form-control" value="{{ old('nomor_telepon', $kamar->nomor_telepon) }}"
                id="nomor_telepon" name="nomor_telepon" required>
        </div>
        <div class="form-group">
            <label for="status">status </label><br>
            <input type="radio" value="Tersedia" id="status" name="status" required>Tersedia</input> <br>
            <input type="radio" value="Sudah di booking" id="status" name="status" required>Sudah di Booking</input>
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
                var gambarValue = "{{ $kamar->gambar_kamar }}";
                if (gambarValue) {
                    previewImg.src = "{{ url('/image/') }}" + "/" + gambarValue;
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
