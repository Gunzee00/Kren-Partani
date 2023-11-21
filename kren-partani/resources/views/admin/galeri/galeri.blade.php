@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('store-galeri') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul_galeri">Judul Galeri</label>
            <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_galeri">Deskripsi</label>
            <textarea class="form-control" id="deskripsi_galeri" name="deskripsi_galeri" rows="10" required></textarea>
        </div>

        <div class="form-group">
            <label for="gambar_galeri">Gambar</label>
            <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                <img class="img-fluid mb-3 col-sm-5" id="preview">
            </div>
            <input accept="image/*" type="file" class="form-control" id="gambar_galeri" name="gambar_galeri"
                @error('gambar') is-invalid @enderror accept="image/*" onchange="previewImage(event)" required>

            @error('gambar_galeri')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


    {{-- Menampilkan data --}}

    <div class="row">
        @foreach ($galeri as $item)
            <div class="col-4">
                <div class="card">
                    {{-- <img src="{{ url('public.image') }}/{{ $item->gambar }}" alt="gambar" class="card-img-top"> --}}
                    <div style="height: 150px; max-width: 600px; overflow:hidden">
                        <img src="{{ url('/image//' . $item->gambar_galeri) }}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">{{ $item->tanggal_rilis }}</p> --}}
                        <p class="card-title">{{ $item->judul_galeri }}</p>
                        <p class="card-text">{{ Str::limit($item->deskripsi_galeri, 20) }}</p>
                        <a href="/detail-galeri/{{ $item->id_galeri }}"
                            class="btn btn-primary btn-block btn-sm">Selengkapnya</a>
                        <div class="row my-2">
                            <div class="col">
                                <a href="/edit-galeri/{{ $item->id_galeri }}"
                                    class="btn btn-primary btn-block btn-sm">Ubah</a>
                            </div>
                            <div class="col">
                                <form action="delete-galeri/{{ $item->id_galeri }}" method="POST" id="deleteForm{{ $item->id_galeri }}">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" class="btn btn-danger btn-block btn-sm" value="Hapus" onclick="return confirmDelete('{{ $item->id_galeri }}')">
                                </form>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    {{ $galeri->links() }}
    {{-- <a href="{{ route('add-artikel') }}" class="btn btn-primary">Tambah Artikel</a> --}}
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
    function confirmDelete(id) {
      var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
    
      if (confirmation) {
        // Submit formulir penghapusan
        document.getElementById('deleteForm' + id).submit();
      }
    
      return false; // Menghentikan tindakan default klik tombol
    }
    </script>
@endsection
