@extends('admin.layouts.master')
@section('content')
    <form action="{{ url('store-datapengunjung') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_pengunjung">Nama Pengunjung</label>
            <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" required>
        </div>
        <div class="form-group">
            <label for="nik">Nik</label>
            <input type="number" class="form-control"  id="nik" name="nik" maxlength="16" required>
        </div>
        <div class="form-group">
            <label for="tempat_tinggal">Tempat Tinggal</label>
            <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


    {{-- Menampilkan data --}}

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengunjung</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Tempat Tinggal</th>
                    <th scope="col" colspan="2">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            @php $no = ($datapengunjung->currentPage() - 1) * $datapengunjung->perPage() + 1; @endphp
            @foreach ($datapengunjung as $item)
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_pengunjung }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->tempat_tinggal }}</td>
                        <td>
                            <a href="/edit-datapengunjung/{{ $item->id_data }}"><button type="button"
                                    class="btn col btn-warning">Ubah</button></a>
                        </td>
                        <td>
                            <form action="delete-datapengunjung/{{ $item->id_data }}" method="POST"
                                id="deleteForm{{ $item->id_data }}">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn col btn-danger btn-block btn-sm" value="Hapus"
                                    onclick="return confirmDelete('{{ $item->id_data }}')">
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        {{ $datapengunjung->links() }}
    </div>
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
