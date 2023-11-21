@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pesan Tempat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mainTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No Hp/WA</th>
                                    <th>Nomor Meja</th>
                                    <th>Tanggal</th>
                                    <th>Jam Kedatangan</th>
                                    <th>Pesan</th>
                                    <th>Waktu Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $reservation)
                                    <tr>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->email }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <td>{{ $reservation->guest }}</td>
                                        <td>{{ $reservation->date }}</td>
                                        <td>{{ $reservation->time }}</td>
                                        <td>{{ $reservation->message }}</td>
                                        <td>{{ $reservation->created_at }}</td>
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
