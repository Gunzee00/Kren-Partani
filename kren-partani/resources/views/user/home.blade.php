@extends('user.layouts.app')
@section('title')
    Home
@endsection
@section('content')
    {{-- <div class="main-banner" id="top">
        <img autoplay muted loop id="bg-video">
            <source src="img/sampul.jpg" type="image" />
        </img>
      

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Selamat Datang </h6>
                <h2> Caldera Toba Sibisa</h2>
            </div>
        </div>
    </div> --}}

 {{-- ganti landing page nya --}}
    <div id="page">
        <section id="gtco-hero" class="gtco-cover"
            style="background-image: url(img/sampul.png); background-repeat:no-repeat; background-size:cover; height:100vh;"
            data-section="home" data-stellar-background-ratio="">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center">
                        <div class="display-t">
                            <div class="display-tc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ***** Main Banner Area End ***** -->
        <!-- ***** Blog Start ***** -->
        <section class="section" id="our-classes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 offset-lg-2">
                        <div class="section">
                            {{-- <h2>Caldera Toba Sibisa </h2> --}}
                            <img src="assets/images/line-dec.png" alt="">
                            {{-- <p>Website Resmi Caldera Toba Sibisa</p> --}}
                        </div>
                    </div>
                </div>
                <section id="gtco-about" data-section="about">
                    @foreach ($artikel as $item)
                    <div class="mt-2" >
                        <div class="row mb-1">
                            <div class="col-md">
                                <img src="{{ url('/image//' . $item->gambar) }}" width="100%;" class="img-responsive" alt="product">
                            </div>
                            <div class="col-md">
                                <h2>{{ $item->judul_artikel }}</h2>
                                <p class="card-text">{{ $item->tanggal_rilis }}</p>
                                <p>{{ $item->deskripsi }}
                                </p>
                            </div>
                        </div><br><br><br>
                        @endforeach
                        {{-- <div id="maksudtujuan" class="row team-item gtco-team-reverse">
                            <div class="col-md-6  col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
                                <h2>Kunjungan Jokowi</h2>
                                <p>Kunjungan wisatawan selama libur Idul Fitri 1443 H ke spot selfie
                                    'Jokowi Point' yang terletak di lokasi wisata The Kaldera Toba Nomadic
                                    Escape, Desa Sibisa, Kecamatan Ajibata, Kabupaten Toba Samosir, Sumatra
                                    Utara mengalami peningkatan tajam. Lokasi spot selfie 'Jokowi Point' menjadi
                                    primadona dan selalu mencuri perhatian para wisatawan yang berkunjung.
                                    Karena sempat viral di mana Presiden Jokowi bersama Ibu Iriana pernah berfoto
                                    selfie di lokasi tersebut dengan latar view Danau Toba saat Presiden meresmikannya
                                    beberapa waktu yang lalu. "Kunjungan wisatawan khususnya di lokasi spot selfie
                                    'Jokowi Point' Caldera Nomadic Escape sejak hari pertama libur Idul Fitri 1443 H
                                    dari tanggal 2 Mei hingga puncaknya 8 Mei 2022, hari ini terus mengalami peningkatan
                                    yang sangat tajam sekitar 30.342.</p>

                            </div>
                            <div class="col-md-6 col-md-push-7 animate-box" data-animate-effect="fadeInRight">
                                <div class="img-shadow">
                                    <img src="aboutimg/foto1.png" style="width: 100%;" class="img-responsive" alt="Photos"
                                        class="img-responsive">
                                </div>
                            </div>
                        </div> <br><br><br>

                </section>
                <section id="gtco-about" data-section="about">
                    <div class="mt-5" style="margin-left: 20px;margin-right:20px;">
                        <div class="row mb-1">
                            <div class="col-md">
                                <img src="aboutimg/foto2.jpg" width="100%;" class="img-responsive" alt="product">
                            </div>
                            <div class="col-md">
                                <h2>Latar Belakang</h2>
                                <p>Caldera Toba adalah sebuah kawah raksasa yang terbentuk dari letusan gunung berapi yang
                                    sangat besar di wilayah Danau Toba di Pulau Sumatra, Indonesia. Toba merupakan salah
                                    satu kaldera terbesar di dunia dan dianggap sebagai kaldera supervulkan. Letusan Toba
                                    terjadi sekitar 74.000 tahun yang lalu dan menghasilkan sejumlah besar abu vulkanik yang
                                    menyebar luas di udara dan menutupi area yang sangat luas.

                                    Kaldera Toba terbentuk ketika gunung berapi meletus dengan kekuatan dahsyat, melepaskan
                                    sejumlah besar magma, abu, dan material vulkanik ke atmosfer. Setelah letusan itu, area
                                    yang dahulu merupakan gunung berapi yang aktif menjadi kaldera besar dengan diameter
                                    sekitar 100 kilometer.
                                </p>
                            </div>
                        </div><br><br><br>
                        <div id="maksudtujuan" class="row team-item gtco-team-reverse">
                            <div class="col-md-6  col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
                                <h2>Kunjungan Jokowi</h2>
                                <p>Kunjungan wisatawan selama libur Idul Fitri 1443 H ke spot selfie
                                    'Jokowi Point' yang terletak di lokasi wisata The Kaldera Toba Nomadic
                                    Escape, Desa Sibisa, Kecamatan Ajibata, Kabupaten Toba Samosir, Sumatra
                                    Utara mengalami peningkatan tajam. Lokasi spot selfie 'Jokowi Point' menjadi
                                    primadona dan selalu mencuri perhatian para wisatawan yang berkunjung.
                                    Karena sempat viral di mana Presiden Jokowi bersama Ibu Iriana pernah berfoto
                                    selfie di lokasi tersebut dengan latar view Danau Toba saat Presiden meresmikannya
                                    beberapa waktu yang lalu. "Kunjungan wisatawan khususnya di lokasi spot selfie
                                    'Jokowi Point' Caldera Nomadic Escape sejak hari pertama libur Idul Fitri 1443 H
                                    dari tanggal 2 Mei hingga puncaknya 8 Mei 2022, hari ini terus mengalami peningkatan
                                    yang sangat tajam sekitar 30.342.</p>

                            </div>
                            <div class="col-md-6 col-md-push-7 animate-box" data-animate-effect="fadeInRight">
                                <div class="img-shadow">
                                    <img src="aboutimg/foto1.png" style="width: 100%;" class="img-responsive" alt="Photos"
                                        class="img-responsive">
                                </div>
                            </div>
                        </div> <br><br><br> --}}

                </section>

                {{-- <section class="mt-5">
                    <div class="row text-center">
                        <div class="text-header">
                            <h1>Lokasi</h1>
                            <p class="sub"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="gtco-contact-info">
                                
                            </div>
                        </div>
                        <div class="col-md">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15942.744958483547!2d98.9460998!3d2.6078521!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ef586f60ca0d%3A0xb805f2c3eaeeda0!2sCaldera%20toba%20nomadic%20escape%20(glamour%20camping)!5e0!3m2!1sid!2sid!4v1686126723651!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </section> --}}

                <!-- ***** About Us Ends***** -->
                <!-- ***** Footer Start ***** -->


                <!-- jQuery -->
                <script src="aset/js/jquery-2.1.0.min.js"></script>

                <!-- Bootstrap -->
                <script src="aset/js/popper.js"></script>
                <script src="aset/js/bootstrap.min.js"></script>

                <!-- Plugins -->
                <script src="aset/js/scrollreveal.min.js"></script>
                <script src="aset/js/waypoints.min.js"></script>
                <script src="aset/js/jquery.counterup.min.js"></script>
                <script src="aset/js/imgfix.min.js"></script>
                <script src="aset/js/mixitup.js"></script>
                <script src="aset/js/accordions.js"></script>

                <!-- Global Init -->
                <script src="assets/js/custom.js"></script>

                </body>

                </html>
            @endsection
