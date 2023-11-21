<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <base href="/public">
    @yield('style')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="path/to/lightbox.css" rel="stylesheet" />
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="aset/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="aset/css/font-awesome.css">

    <link rel="stylesheet" href="aset/css/style.css">

    <style>

    </style>
</head>

<body style="height: 100%;">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #64AA54;">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="{{ url('/') }}"><h5> Partani </h5>   
                        {{-- <img src="img/logo.jpg" height="45" alt="Caldera Toba" loading="lazy" /> --}}
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/list-menu">Beli Kebutuhan</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Pesan Tempat</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/aboutususer">Article</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/user-artikel">Artikel</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/review') }}">Review</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user-galeri') }}">Galeri</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/image') }}">Gallery</a>
                        </li> --}}
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/pesanan') }}">Pesanan</a>
                            </li>
                        @endif

                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav-link text-white">Masuk</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button type="button"
                                    class="btn btn-primary">Daftar</button></a>
                        @endif
                    @endguest
                    <!-- Icon -->
                    @if (Route::has('login'))
                        @auth
                            {{-- @php $orders = \DB::select("SELECT * from pesanans where status = 3 and user_id = ".{{ Auth::user()->id }});
                             $packing = \DB::select("SELECT * from pesanans where status = 4");
                             $tracking = \DB::select("SELECT * from pesanans where status = 5");
                        @endphp --}}
                            @php
                                $orders = \DB::table('pesanans')
                                    ->where('status', 3)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                                $packing = \DB::table('pesanans')
                                    ->where('status', 4)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                                $tracking = \DB::table('pesanans')
                                    ->where('status', 5)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                                $tracking = \DB::table('pesanans')
                                    ->where('status', 6)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                            @endphp
                            <div class="dropdown">
                                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
                                    id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-bell"></i>
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger">{{ count($orders) }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach ($orders as $item)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('pesanan/' . $item->id) }}">{{ 'Tiket anda dengan kode ' . $item->kode . ' sudah di confirm' }}</a>
                                        </li>
                                    @endforeach
                                    @foreach ($packing as $item)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('pesanan/' . $item->id) }}">{{ 'Lihat hasil tiket anda' }}</a>
                                        </li>
                                    @endforeach
                                    @foreach ($tracking as $item)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('pesanan/' . $item->id) }}">{{ 'Tiket anda sudah di kirim' }}</a>
                                        </li>
                                    @endforeach
                                    @foreach ($tracking as $item)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('pesanan/' . $item->id) }}">{{ 'Pesanan anda ditolak' }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <?php
                            $pesanan_utama = App\Models\Pesanan::where('user_id', Auth::user()->id)
                                ->where('status', 0)
                                ->first();
                            if (!empty($pesanan_utama)) {
                                $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                            ?>
                            <a class="text-reset me-4" href="{{ 'checkout' }}">
                                <i class="fas fa-shopping-cart"></i>
                                @if (!empty($notif))
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger">{{ $notif }}</span>
                                @endif
                            </a>
                            <!-- Avatar -->
                            @php
                                $avatars = App\Models\User::where('id', Auth::user()->id)->first();
                            @endphp
                            <div class="dropdown">
                                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    @if ($avatars->avatar)
                                        <img src="avatar/{{ $avatars->avatar }}" class="rounded-circle" height="35"
                                            alt="avatar/{{ $avatars->avatar }}" loading="lazy" />
                                    @else
                                        <img src="avatar/user.png" class="rounded-circle" height="35"
                                            alt="avatar/user.png" loading="lazy" />
                                    @endif
                                    <strong class="d-none d-sm-block ms-3 text-dark">{{ Auth::user()->name }}</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('profile') }}">Akun Saya</a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ url('pesanan') }}">Pesanan</a>
                                    </li> --}}
                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ url('/history') }}">History Pesanan</a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Keluar') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    @endif
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
        <main class="py-4" style="margin-bottom: 20px; margin-top: 60px;">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    <hr class="footer-divider" style="border: 3px solid rgb(36, 15, 221)">
    </hr>
    <div class="footer-commons">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 order-sm-0 order-md-0 dcd-bg-gray">
                    <div class="">
                        <div class="row">
                            <div class="col-4 mt-3">
                                {{-- <img src="img/logo.jpg" alt="Caldera Toba" style="max-height: 207px;" width="150"
                                    height="120"> --}}
                            </div>
                            <div class="col-8">
                                <p class="mt-4 ml-5" style="font-size: 15px;">PARTANI<br>
                                    Pendistribusian hasil tani</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 order-sm-2 order-md-1 bg-white py-5">
                    <div class="row justify-content-end py-lg-5">
                        <div class="col-md-3 col-sm-6 mt-3 mt-md-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('script')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</body>
<script>
    $(document).on('change', '.file-input', function() {
                <
                !--Copyright-- >
                <
                /footer> <
                script src = "https://code.jquery.com/jquery-3.6.0.slim.js"
                integrity = "sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
                crossorigin = "anonymous" >
</script>

</body>
<script>
    $(document).on('change', '.file-input', function() {
        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }
    });
</script>


</html>
