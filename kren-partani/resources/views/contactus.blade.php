@extends('user.layouts.app')
@section('title')
    Contact Us
@endsection
@section('content')
    <!-- Content page -->
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Pesan Tempat</h2>
                <p class="lead">Jika anda ingin berkunjung ke tempat kami silahkan lengkapi form di bawah ini. pastikan
                    data diri anda sesuai agar kami bisa menghubungi anda. Terimakasih</p>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Contact Person Kami</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Email</h6>
                                <small class="text-muted">bandrekandaliman@gmail.com</small>
                            </div>
                            <a href="mailto:info@yoursite.com" target="_blank"><button type="button"
                                    class="btn btn-primary btn-lg btn-floating" style="background-color: #dd4b39;">
                                    <i class="fas fa-envelope"></i>
                                </button></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Facebook</h6>
                                <small class="text-muted">Bandrek andaliman</small>
                            </div>
                            <a href="https://www.facebook.com/bandrekandaliman/" target="_blank"><button type="button"
                                    class="btn btn-primary btn-lg btn-floating">
                                    <i class="fab fa-facebook-f"></i>
                                </button></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Instagram</h6>
                                <small class="text-muted">@bandrek_andaliman</small>
                            </div>
                            <!-- Instagram -->
                            <a href="https://instagram.com/bandrek_andaliman?igshid=YmMyMTA2M2Y=" target="_blank"><button
                                    type="button" class="btn btn-primary btn-lg btn-floating"
                                    style="background-color: #ac2bac;">
                                    <i class="fab fa-instagram"></i>
                                </button></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">WhatsApp</h6>
                                <small class="text-muted">0822-6250-5752</small>
                            </div>
                            <a href="https://wa.wizard.id/57ef16" target="_blank"><button type="button"
                                    class="btn btn-primary btn-lg btn-floating" style="background-color: #25d366;">
                                    <i class="fab fa-whatsapp"></i>
                                </button></a>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Jika ingin berkunjung ke tempat kami anda bisa mengikuti rute google map yang kami
                                sediakan di bawah</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3"></h4>
                    <form action="{{ url('/reservation') }}" method="post" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="namaanda" class="form-label">Nama Anda</label>
                                <input type="text" name="name" class="form-control" id="validationDefaultUsername" placeholder="" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Email Aktif</label>
                                <input type="email" name="email" class="form-control" id="lastName" placeholder="" value="{{ old('email') }}"
                                    required>
                                    @error('email')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                    @enderror
                            </div>

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="typeNumber">No Hp/WA</label>
                                    <input type="number" name="phone" id="typeNumber" class="form-control" placeholder="" value="{{ old('phone') }}"
                                        required>
                                    @error('phone')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="typeNumber">Nomor Meja</label>
                                    <input type="number" name="guest" id="typeNumber" class="form-control" placeholder="" value=""
                                        required>
                                        @error('guest')
                                        <div class="text-danger">
                                            *{{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Tanggal Kedatangan</label>
                                        <input type="date" name="date"  class="form-control timepicker-input active" id="firstName"
                                            placeholder="" value="" required>
                                            @error('date')
                                            <div class="text-danger">
                                                *{{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Waktu tiba di tempat</label>
                                        <input type="time" name="time"  class="form-control" id="lastName" placeholder=""
                                            value="" required>
                                            @error('time')
                                            <div class="text-danger">
                                                *{{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <textarea name="message" class="form-control" id="form6Example7" rows="7" style="resize: none;"></textarea>
                                        <label class="form-label" for="form6Example7">Pesan</label>
                                        @error('message')
                                        <div class="text-danger">
                                            *{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary" value="Save">Kirim Pesan</button>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <!-- Map -->
        <div class="map">
            <!-- <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5086.907373970723!2d98.71762905804279!3d2.3350194502143786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e252ebe3e90e9%3A0xf5b5c24020b9df4c!2sBandrek%20Andaliman!5e1!3m2!1sid!2sid!4v1654255804608!5m2!1sid!2sid"
                width="1120" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
@endsection
