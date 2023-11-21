@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Agen & Pelayan</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/addagen') }}"><button type="submit" class="btn btn-icon icon-left btn-info" value="Save"><i class="fas fa-user-plus"></i>Tambah</button></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Akun SosMed</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td class="py-1 text-center">
                                            <img style="height:70px ; width:70px;" src="agenimage/{{ $data->image }}"
                                                alt="image profile" class="mr-3 user-img-radious-style user-list-img"
                                                width="100" />
                                        </td>
                                        <td class="text-center">{{ $data->name }}</td>
                                        <td class="text-center">{{ $data->speciality }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/viewagen') }}" class="btn btn-icon btn-primary facebook"><i class=" fab fa-facebook-f"></i></a>
                                            <a href="{{ url('/viewagen') }}"  class="btn btn-icon btn-info"><i class="fab fa-instagram"></i></a>
                                            <a href="{{ $data->twitter }}" target="_blank" class="btn btn-icon btn-success"><i class="fab fa-whatsapp"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-icon btn-success" href="{{ url('/updateagen', $data->id) }}"><i class="fas fa-user-edit"></i></a>
                                            <a class="btn btn-icon btn-danger" href="{{ url('/deleteagen', $data->id) }}"><i class="fas fa-trash"></i></a>
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
@endsection
