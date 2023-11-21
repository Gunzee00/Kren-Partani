@extends('admin.layouts.master')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Hasil Review</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="mainTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Video</th>
                                <th>Ulasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if(empty($adminReview->all()))
                            <tr>
                                <td colspan="6" class="text-center"><p>Nothing data</p></td>
                            </tr>
                        @else
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($adminReview as $index => $data)
                            <form action="{{ url('/delete-review-admin/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <tr>
                                    <td>{{ $index + $adminReview->firstItem() }}</td>
                                    <td>{{ $data->pelanggan->name }}</td>
                                    <td><img src="productimage/{{ $data->img2 }}" height="100px" width="100px" alt=""></td>
                                    <td>
                                        <a href="upload/{{ $data->video }}" data-sub-html="Demo Description">
                                            <video src="upload/{{ $data->video }}" height="100px" width="100px"></video>
                                        </a>
                                    </td>
                                    <td>{{ $data->review }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                    {{ $adminReview->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection