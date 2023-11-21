@extends('user.layouts.app')
@section('title')
    Upload Gambar
@endsection
@section('style')
    <style>
        body {
            background-color: gray;
        }


        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 475px;
            height: 300px;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            transition: 0.2s;

        }

        .choose-file-button {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .file-message {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;

        }

        .mt-100 {
            margin-top: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="container d-flex justify-content-center mt-100">
        <div class="row">
            <div class="col-md-12">
                <h2>Ubah Bukti Pembayaran</h2>
                <a href="{{ route('history.detail') }}"><button type="button" class="btn btn-primary"
                        style="margin-bottom: 15px;">Kembali</button></a>
                <form action="{{ url('/upload-process/' . $dataPesan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="file-drop-area" style="border: 1px solid black">
                        <span class="choose-file-button">Choose files</span>
                        <span class="file-message">or drag and drop files here</span>
                        <input class="file-input" type="file" multiple name="bukti_pembayaran">
                        @error('penjualan_tiket')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:15px;">Submit</button>
                </form>

            </div>


        </div>

    </div>
@endsection
