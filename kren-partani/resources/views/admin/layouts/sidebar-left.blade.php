<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">  <span
                    class="logo-name">Partani </span>
            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown {{ $title === 'Dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if (Auth::check() && Auth::user()->usertype === '2')
                <li class="dropdown {{ $title === 'User Management' || $title === 'Restore User' ? 'active' : '' }}">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fas fa-users"></i>
                        <span>Kelola Akun</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin') }}">Admin</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('user.role') }}">User</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->usertype === '1')
            <li
                class="dropdown {{ $title === 'Tambah Tiket' || $title === 'Tambah Data Menu' || $title === 'Edit Data Menu' ? 'active' : '' }}">
                <a href="{{ route('menu') }}" class="nav-link">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Tambah Produk</span>
                </a>
            </li>
            {{-- <li
                class="dropdown {{ $title === 'Data Menu' || $title === 'Tambah Data Kamar' || $title === 'Edit Data Tiket' ? 'active' : '' }}">
                <a href="{{ url('/show-kamar') }}" class="nav-link">
                    <i class="fas fa-utensils"></i>
                    <span>Kamar</span>
                </a>
            </li> --}}
            {{-- <li
                class="dropdown {{ $title === 'Data Kamar' || $title === 'Tambah Data Kamar' || $title === 'Edit Data Tiket' ? 'active' : '' }}">
                <a href="{{ url('/show-kamar') }}" class="nav-link">
                    <i class="fas fa-person-booth"></i>
                    <span>Kamar</span>
                </a>
            </li> --}}
            {{-- <li class="dropdown {{ $title === 'Review' ? 'active' : '' }}">
                <a href="{{ url('/reviews-admin') }}" class="nav-link">
                    <i class="fas fa-comments"></i>
                    <span>Revieww</span>
                </a>
            </li> --}}
            {{-- <li class="dropdown {{ ($title === "Gallery" || $title === "Tambah Gallery" || $title === "Update Gallery") ? 'active' : '' }}">
                <a href="{{ url('/gallerys') }}" class="nav-link">
                    <i class="fas fa-image"></i>
                    <span>Gallery</span>
                </a>
            </li> --}}
            {{-- <li
                class="dropdown {{ $title === 'Gallery' || $title === 'Tambah Gallery' || $title === 'Update Gallery' ? 'active' : '' }}">
                <a href="{{ url('/show-galeri') }}" class="nav-link">
                    <i class="fas fa-image"></i>
                    <span>Galeri</span>
                </a>
            </li> --}}

            {{-- <li
                class="dropdown {{ $title === 'Artikel' || $title === 'Tambah Artikel' || $title === 'Update Artikel' ? 'active' : '' }}">
                <a href="{{ url('/show-artikel') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Artikel</span>
                </a>
            </li> --}}

            {{-- <li
                class="dropdown {{ $title === 'Data Pengunjung' || $title === 'Tambah Data Pengunjung' || $title === 'Update Data Pengunjung' ? 'active' : '' }}">
                <a href="{{ url('/show-datapengunjung') }}" class="nav-link">
                    <i class="fas fa-server"></i>
                    <span>Tambah Data Pengunjung</span>
                </a>
            </li> --}}
            {{-- <li class="dropdown {{ $title === 'Reservation' ? 'active' : '' }}">
                <a href="{{ url('/viewreservation') }}" class="nav-link"><i
                        class="fas fa-ticket-alt"></i><span>Reservation</span></a>
            </li> --}}
            <li
                class="dropdown {{ $title === 'Data Pemesanan' || $title === 'Pemesanan Selesai' || $title === 'Hasil File' ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pesanan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('oder.deatail') }}">Pesanan masuk</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('confirm.photo') }}">Kirim Bukti Pengiriman</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('penjualan.tiket') }}">Penjualan Barang</a></li>
                </ul>

                {{-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('order.tracking') }}">Tracking </a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/order-finish') }}">Order Finished</a></li>
                </ul> --}}
            </li>
            @endif
            {{-- <li
                class="dropdown {{ $title === 'Data Pemesanan' || $title === 'Pemesanan Selesai' || $title === 'Hasil File' ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-shopping-cart"></i>
                    <span>E-Tiket & Voucher Kamar</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('oder.deatail') }}">E-Tiket</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('confirm.photo') }}">Voucher Kamar</a></li>
                </ul>

            </li> --}}
            {{-- <li
                class="dropdown {{ $title === 'About Us' || $title === 'Add About Us' || $title === 'Edit About Us' ? 'active' : '' }}">
                <a href="/aboutus" class="nav-link">
                    <i class="fas fa-info"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="dropdown {{ $title === 'Contact Us' ? 'active' : '' }}">
                <a href="{{ url('/contact-us') }}" class="nav-link">
                    <i class="fas fa-address-book"></i>
                    <span>Contact Us</span>
                </a>
            </li> --}}
            </li>
        </ul>
    </aside>
</div>
