@extends('admin.layouts.master')
@section('content')
<form action="{{ url('edit-datapengunjung', $data->id_data) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama_pengunjung">Nama Pengunjung</label>
        <input type="text" class="form-control" value="{{ old('nama_pengunjung', $data->nama_pengunjung) }}" id="nama_pengunjung" name="nama_pengunjung" required>
    </div>
    <div class="form-group">
        <label for="nik">Nik</label>
        <input type="number" class="form-control" value="{{ old('nik', $data->nik) }}" id="nik" name="nik" required>
    </div>
    <div class="form-group">
        <label for="tempat_tinggal">Tempat Tinggal</label>
        <input type="text" class="form-control" value="{{ old('tempat_tinggal', $data->tempat_tinggal) }}"  id="tempat_tinggal" name="tempat_tinggal" required>
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

@endsection
