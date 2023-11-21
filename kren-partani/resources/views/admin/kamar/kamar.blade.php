@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('store-kamar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kamar">Nama Kamar</label>
            <input placeholder="Masukkan Nama Kamar" type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                required>
                
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea placeholder="Deskripisi Kamar" class="form-control" id="deskripsi" name="deskripsi" rows="10" required></textarea>
        </div>

        <div class="form-group" enctype="multipart/form-data">
            <label for="gambar_kamar">Gambar</label>
            <div style="max-height: 500px; max-width: 600px; overflow:hidden">
                <img class="img-fluid mb-3 col-sm-5" id="preview">
            </div>
            <input placeholder="Masukkan Gambar Kamar" type="file" class="form-control" id="gambar_kamar" name="gambar_kamar"
                @error('gambar_kamar') is-invalid @enderror accept="image/*" onchange="previewImage(event)" required multiple>

            @error('gambar_kamar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input placeholder="Masukkan Nomor Telepon" type="text" class="form-control" id="nomor_telepon"
                name="nomor_telepon" required>
                <p class="text-danger">*Mohon nomor telepon dengan contoh berikut: 6281234567890</p>

        </div>
        <div class="form-group">
            <label for="status" value="tersedia"></label>
            <input type="text" hidden class="form-control" value="tersedia" id="status" name="status" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


    {{-- Menampilkan data --}}

    <div class="row">
        @foreach ($kamar as $item)
            <div class="col-4">
                <div class="card">
                    {{-- <img src="{{ url('public.image') }}/{{ $item->gambar }}" alt="gambar" class="card-img-top"> --}}
                    <div style="height: 150px; max-width: 600px; overflow:hidden">
                        <img src="{{ url('/image//' . $item ->gambar_kamar) }}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">{{ $item->tanggal_rilis }}</p> --}}
                        <p class="card-title">{{ $item->nama_kamar }}</p>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 20) }}</p>
                        <p class="card-title">Kontak yang dapat dihubungi: {{ $item->nomor_telepon }}</p>
                        <p class="card-title">Status: @if ($item->status)
                                {{ $item->status }}
                            @else
                                Tersedia
                            @endif
                        </p>
                        <a href="/detail-kamar/{{ $item->id_kamar }}"
                            class="btn btn-primary btn-block btn-sm">Selengkapnya</a>
                        <div class="row my-2">
                            <div class="col">
                                <a href="/edit-kamar/{{ $item->id_kamar }}"
                                    class="btn btn-primary btn-block btn-sm">Ubah</a>
                            </div>
                            <div class="col">
                                <form action="delete-kamar/{{ $item->id_kamar }}" method="POST" id="deleteForm{{ $item->id_kamar }}">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" class="btn btn-danger btn-block btn-sm" value="Hapus" onclick="return confirmDelete('{{ $item->id_kamar }}')">
                                </form>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
       
    </div>
    {{ $kamar->links() }}
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
