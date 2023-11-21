@extends('admin.layouts.master')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Order Finished</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="mainTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Kode</th>
                                <th>Jumlah Harga</th>
                                <th>Tanggal</th>
                                <th>Alamat Penerima</th>
                                <th>Lihat Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataResult as $index => $data)
                                <tr>
                                    <td>{{ $index + $dataResult->firstItem() }}</td>
                                    <td>{{ $data->users->name }}</td>
                                    <td>{{ __('Sudah bayar') }}</td>
                                    <td>{{ $data->kode }}</td>
                                    <td>Rp{{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>
                                    <td>{{ $data->updated_at->isoFormat('dddd, D MMM Y') }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>
                                        <a href="{{ url('/order-finish/'.$data->id) }}" class="nav-link">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataResult->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
