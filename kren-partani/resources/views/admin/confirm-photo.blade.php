@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kirim Bukti Pengiriman</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mainTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pemesan</th>
                                    {{-- <th>Tiket</th> --}}
                                    {{-- <th>Kode</th> --}}
                                    <th>Jumlah Harga</th>
                                    
                                    <th>Kirim Bukti Pengiriman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($dataConfirmPhoto as $index => $data)
                                    <form action="{{ url('/confirm-photo-process/' . $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <tr>
                                            <td>{{ $index + $dataConfirmPhoto->firstItem() }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            {{-- <td>{{ $data->jenis_tiket }}</td> --}}
                                            {{-- <td> 
                                            {{ $data->barangs->jenis_tiket }}
                                        </td> --}}
                                            {{-- <td>
                                                <a href="{{ route('order.detail', ['id' => $data->id]) }}" class="nav-link">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td> --}}

                                            {{-- <td>{{ $data->kode }}</td> --}}

                                            <td>Rp{{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>
                                            {{-- <td>{{ $data->updated_at->isoFormat('dddd, D MMM Y') }}</td>
                                            <td>{{ $data->tanggal_tiket }}</td> --}}
                                            <td>
                                                <input multiple="true" type="file" name="img[]" required>
                                                @error('img')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                @if (!old('img'))
                                                    <div class="text-info">

                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="submit" multiple="true" class="btn btn-primary"
                                                    onclick="return confirmUpload()">Unggah</button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dataConfirmPhoto->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmUpload() {
            var confirmation = confirm("Apakah Anda yakin ingin mengunggah file ini?");

            return confirmation;
        }
    </script>
@endsection
