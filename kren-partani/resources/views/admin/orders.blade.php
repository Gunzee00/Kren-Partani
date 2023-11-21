@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>New Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mainTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    {{-- <th>Nama Tiket</th> --}}
                                    {{-- <th>Jumlah</th> --}}
                                    {{-- <th>Kode</th> --}}
                                    <th>Total Pembelian</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Tanggal Barang Dibutuhkan</th>
                                    {{-- <th>Detail Pesanan</th> --}}
                                    <th>Bukti Pembayaran</th>
                                    <th colspan="2"><center>Aksi</center></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($dataOrders as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        {{-- <td>
                                            {{ $data->barangs->jenis_tiket }}
                                        </td> --}}
                                        {{-- <td>{{ $data->jumlah_pesan }} Buah</td> --}}
                                            {{-- <td>{{ $data->kode }}</td> --}}
                                        <td>Rp{{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>
                                        <td>{{ $data->updated_at->isoFormat('dddd, D MMM Y') }}</td>
                                        <td>{{ $data->tanggal_tiket }}</td>
                                        {{-- <td>
                                            <a href="{{ route('order.detail', ['id' => $data->id]) }}" class="nav-link">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td> --}}
                                        <td>
                                            <a href="{{ url('/result-file/' . $data->id) }}" class="nav-link">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/confirm-order-process/' . $data->id) }}"
                                                onclick="return confirmConfirmation()">
                                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/reject-order-process/' . $data->id) }}"
                                                onclick="return confirmRejection()">
                                                <button type="submit" class="btn btn-danger">Tolak </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dataOrders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmConfirmation() {
            var confirmation = confirm("Apakah Anda yakin ingin mengkonfirmasi pesanan ini?");

            return confirmation;
        }
    </script>
@endsection
