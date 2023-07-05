<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @if (request()->is('dashboard'))
                    <li class="breadcrumb-item text-sm"><a class="opacity-10 text-white" href="#">Dashboard</a></li>
                @elseif(request()->is('mereks', 'mereks/*'))
                    @if (request()->is('mereks/create'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('mereks.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Create</a></li>
                    @elseif (request()->is('mereks/*/edit'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('mereks.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Edit</a></li>
                    @else
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-10 text-white" href="#">@yield('title')</a></li>
                    @endif
                @elseif(request()->is('distributors', 'distributors/*'))
                    @if (request()->is('distributors/create'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('distributors.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Create</a></li>
                    @elseif (request()->is('distributors/*/edit'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('distributors.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Edit</a></li>
                    @else
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-10 text-white" href="#">@yield('title')</a></li>
                    @endif
                @elseif(request()->is('barangs', 'barangs/*'))
                    @if (request()->is('barangs/create'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('barangs.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Create</a></li>
                    @elseif (request()->is('barangs/*/edit'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('barangs.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Edit</a></li>
                    @else
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-10 text-white" href="#">@yield('title')</a></li>
                    @endif
                @elseif(request()->is('users', 'users/*'))
                    @if (request()->is('users/create'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('users.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Create</a></li>
                    @else
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-10 text-white" href="#">@yield('title')</a></li>
                    @endif
                @elseif(request()->is('transaksis', 'transaksis/*', 'items'))
                    @if (request()->is('items'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('transaksis.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">Keranjang</a></li>
                    @elseif (request()->is('transaksis/*'))
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('transaksis.index') }}">@yield('title')</a></li>
                        <li class="breadcrumb-item text-sm text-white" aria-current="page"><a class="opacity-10 text-white active" href="#">View</a></li>
                    @else
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-10 text-white" href="#">@yield('title')</a></li>
                    @endif
                @endif
            </ol>
            @if (request()->is('*/create'))
                <h6 class="font-weight-bolder text-white mb-0">Create</h6>
            @elseif(request()->is('*/edit'))
                <h6 class="font-weight-bolder text-white mb-0">Edit</h6>
            @elseif(request()->is('items'))
                <h6 class="font-weight-bolder text-white mb-0">Keranjang</h6>
            @else
                <h6 class="font-weight-bolder text-white mb-0">@yield('title')</h6>
            @endif
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav justify-content-end">
                @if (!auth()->check())
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ url('/login') }}" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item d-flex align-items-center text-white">
                        <i class="fas fa-user-circle fa-lg"></i>
                        <span class="d-sm-inline d-none ms-2">{{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item d-flex align-items-center mx-3">
                        <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-sign-out-alt text-white"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                {{-- <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Apakah kamu yakin ingin mengakhiri sesi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="$('#logout-form').submit();">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</nav>
