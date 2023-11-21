@extends('admin.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About Us</h4>
                        <p class="card-description">
                            <a href="/addaboutus"><button type="button" class="btn btn-info btn-icon-text">Tambah Data<i class="mdi mdi-bookmark-plus"></i></button></a>
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center"><h4>Judul</h4></th>
                                        <th class="text-center"><h4>Deskripsi</h4></th>
                                        <th class="text-center"><h4>Gambar</h4></th>
                                        <th class="text-center"><h4>Action</h4></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutuss as $aboutus)
                                    <tr>
                                        <td class="text-center">{{ $aboutus->judul }}</td>
                                        <td class="text-center">{{ $aboutus->deskripsi }}</td>
                                        <td class="text-center"><img src="aboutusimage/{{ $aboutus->gambar }}" style="height: 100px; width:100px; align-item:center;" alt="About Us"></td>
                                        <td class="text-center">
                                            <a href="{{ url('/edit-aboutus/'.$aboutus->id) }}"><button type="button" class="btn btn-warning btn-icon-text"><i class="ti-reload btn-icon-prepend"></i>Edit</button></a>
                                            <form action="{{ url('/delete/'.$aboutus->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-icon-text" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
