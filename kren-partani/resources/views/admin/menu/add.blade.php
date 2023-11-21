@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambahkan Tiket Masuk</h4>
                        <form action="{{ route('add.menu.process') }}" method="post" enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="jenis_tiket" class="form-control" placeholder="Nama Tiket" value="{{ old('jenis_tiket') }}">
                                @error('jenis_tiket')
                                    <div class="text-danger">
                                        Masukkan nama tiket
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" name="harga" class="form-control" placeholder="Harga Tiket" value="{{ old('harga') }}">
                                @error('harga')
                                    <div class="text-danger">
                                        Masukkan harga tiket
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="keterangan" class="form-control"
                                    placeholder="Keterangan Tiket"  value="{{ old('keterangan') }}" >
                                @error('keterangan')
                                    <div class="text-danger">
                                        Masukkan keterangan tiket 
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" name="stok" class="form-control"
                                    placeholder="Stok" value="{{ old('stok') }}">
                                @error('stok')
                                    <div class="text-danger">
                                        Masukkan stok tiket 
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar Tiket</label>
                                <input type="file" name="gambar_tiket" accept="image/*" id="gambar_tiket" onchange="previewImage(event)">
                                <img id="gambar-preview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none;">
                                @error('gambar_tiket')
                                    <div class="text-danger">
                                        Masukkan gambar tiket 
                                    </div>
                                @enderror
                            </div>                        
                            <a href="{{ route('menu') }}"><button type="button" class="btn btn-dark btn-icon-text" value="Save"><i class="mdi mdi-plus-box"></i> Kembali</button></a>
                            <button type="submit" class="btn btn-primary btn-icon-text" value="Save"><i class="mdi mdi-plus-box"></i> Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('gambar-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection