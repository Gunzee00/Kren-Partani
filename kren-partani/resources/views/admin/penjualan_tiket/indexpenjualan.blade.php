    @extends('admin.layouts.master')
    @section('content')
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Penjualan Produk</h4>
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
                                        {{-- <th>Tanggal Penggunaan Tiket</th> --}}
                                        <th>Status</th>
                                        {{-- <th>Detail Pesanan</th> --}}
                                        <th>Bukti Pembayaran</th>
                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = ($pesanan_details->currentPage() - 1) * $pesanan_details->perPage() + 1; @endphp
                                    @foreach ($pesanan_details as $data)
                                    @if (
                                            // $data->status == 1 ||
                                            //     $data->status == 2 ||
                                            //     $data->status == 3 ||
                                            //     $data->status == 4 ||
                                                $data->status == 4 ||
                                                $data->status == 6)
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
                                            {{-- <td>{{ $data->tanggal_tiket }}</td> --}}
                                            <td>
                                                @if ($data->status == 4)
                                                        Pesanan berhasil
                                                    @elseif($data->status == 6)
                                                        Pesanan ditolak
                                                    @endif
                                            </td>
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
                                            
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table> 
                            {{ $pesanan_details->links() }}
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
