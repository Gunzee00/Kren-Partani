@extends('admin.layouts.master')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit profil Agen dan Pelayan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/editagen', $data->id) }}" method="Post" enctype="multipart/form-data" class="form-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Agen / Pelayan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $data->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Foto Lama</label>
                                    <div class="col-sm-9">
                                        <img src="/agenimage/{{ $data->image }}" alt="Profil" width="120px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Posisi</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="speciality" class="form-control"
                                            value="{{ $data->speciality }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Foto Baru</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" placeholder="Masukkan Foto Baru" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Sosial Media (NB: jika tidak ada akun sosial media beri tanda " - ")
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="facebook"
                                                    value="{{ $data->facebook }}" aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <a href="{{ $data->facebook }}" target="_blank"
                                                        class="btn btn-icon btn-primary" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">

                                    <div class="col-sm-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Instagram</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="instagram"
                                                    value="{{ $data->instagram }}" aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <a href="{{ $data->instagram }}" target="_blank"
                                                        class="btn btn-icon btn-info" target="_blank"><i
                                                            class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">

                                    <div class="col-sm-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">WhatsApp</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="twitter"
                                                    value="{{ $data->twitter }}" aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <a href="{{ $data->twitter }}" target="_blank"
                                                        class="btn btn-icon btn-success" target="_blank"><i
                                                            class="fab fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-icon-text" value="Save"><i class="fas fa-save"></i> Edit</button>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
