@extends('admin.layouts.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Administrator</h4>
            <p class="card-description">Admin Caldera Toba Sibisa</p>
            <a href="{{ url('/add-admin') }}"><button type="button" class="btn btn-primary btn-icon-tex" ><i class="ti-alert btn-icon-prepend"></i>Tambah Admin</button></a>
            <a href="{{ route('trash.user') }}" style="float: right"><button type="button" class="btn btn-warning btn-icon-tex" ><i class="ti-alert btn-icon-prepend"></i>Riwayat</button></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Aksi    </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                    @foreach ($dataAdmin as $index => $data)
                        @if ($data->usertype == '1')
                        <tr class="text-center">
                            <td class="text-center"><h5>{{ $no++; }}</h5></td>
                            <td class="text-center"><h6>{{ $data->name }}</h6></td>
                            <td class="text-center"><h6>{{ $data->email }}</h6></td>
                            @if($data->id == Auth::user()->id)
                                <td class="text-center">
                                    <a href="{{ url('/delete-role/'.$data->id) }}"><button type="button" class="btn btn-success btn-icon-tex" hidden><i class="ti-alert btn-icon-prepend"></i>Active</button></a>
                                </td>
                            @else
                            <td class="text-center">
                                <a href="{{ url('/edit-admin/'.$data->id) }}"><i class="fas fa-pen" style="font-size: 20px;margin-right:10px;"></i></a>
                                <a href="{{ url('/delete-role/'.$data->id) }}">
                                    <button type="button" class="btn btn-success btn-icon-tex" onclick="return confirmToggle('{{ $data->id }}')">Non-Aktifkan Akun</button>
                                  </a>
                            </td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                {{ $dataAdmin->links() }}
            </div>
        </div>
    </div>
</div>
<script>
function confirmToggle(id) {
  var confirmation = confirm("Apakah Anda yakin ingin mengubah status aktif untuk akun ini?");

  if (confirmation) {
    // Submit form untuk mengaktifkan atau menonaktifkan
    document.getElementById('deleteForm' + id).submit();
  }

  return false; // Menghentikan tindakan default klik tombol
}
</script>
@endsection