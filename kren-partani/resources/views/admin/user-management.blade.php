@extends('admin.layouts.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Management User</h4>
            <p class="card-description">Akun Pengunjung Caldera Toba Sibisa</p>
            <a href="{{ route('trash.user') }}" style="float: right"><button type="button" class="btn btn-danger btn-icon-tex" ><i class="ti-alert btn-icon-prepend"></i>Riwayat</button></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">No.</th>
                            <th class="">Nama</th>
                            <th class="">Email</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataUser as $index => $data)
                        @if ($data->usertype == '0')
                        <tr class="">
                            <td class=""><h5>{{ $index + $dataUser->firstItem() }}</h5></td>
                            <td class=""><h6>{{ $data->name }}</h6></td>
                            <td class=""><h6>{{ $data->email }}</h6></td>
                            <td class="">
                                <a href="{{ url('/delete-role/'.$data->id) }}">
                                    <button type="button" class="btn btn-success btn-icon-text" onclick="return confirmToggle('{{ $data->id }}')">Non-Aktifkan Akun</button>
                                  </a>
                            </td>
                        </tr>  
                        @endif
                    @endforeach
                    </tbody>
                </table>
                {{ $dataUser->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    function confirmToggle(id) {
      var confirmation = confirm("Apakah Anda yakin ingin mengubah status aktif untuk akun ini?");
    
      return confirmation;
    }
    </script>
@endsection