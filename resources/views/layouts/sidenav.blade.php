<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('master/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">My POS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height: calc(100vh)">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
        @role('admin')
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('mereks') ? 'active' : '' }}" href="{{ url('mereks') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Merek</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('distributors') ? 'active' : '' }}" href="{{ url('distributors') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Distributor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('barangs') ? 'active' : '' }}" href="{{ url('barangs') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Barang</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transaksis') ? 'active' : '' }}" href="{{ url('transaksis') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Transaksi</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('items') ? 'active' : '' }}" href="{{ url('items') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Keranjang</span>
            </a>
            </li>
        @endrole
        @role('kasir')
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transaksis') ? 'active' : '' }}" href="{{ url('transaksis') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Transaksi</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('items') ? 'active' : '' }}" href="{{ url('items') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Keranjang</span>
            </a>
            </li>
        @endrole
        </ul>
    </div>
</aside>
