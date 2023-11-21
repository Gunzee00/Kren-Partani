@extends('admin.layouts.master')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Hubungi Kami</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="mainTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($dataContact as $data)
                                <tr>
                                    <td>{{ $no++; }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataContact->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection