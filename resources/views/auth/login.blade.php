<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('master/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('master/assets/img/favicon.png') }}">
    <title>
        Login | My POS
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('master/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Silahkan masukkan password dan email anda</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg @error('email') has-error @enderror"
                                                placeholder="Email" aria-label="Email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @if(Session::has('error'))
                                                <div class="alert alert-danger">
                                                {{ Session::get('error')}}
                                                </div>
                                                @endif
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg @error('password') has-error @enderror"
                                                placeholder="Password" aria-label="Password" name="password"
                                                required autocomplete="current-password">
                                                @if(Session::has('error'))
                                                <div class="alert alert-danger">
                                                {{ Session::get('error')}}
                                                </div>
                                                @endif
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Ingat Saya</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"My POS"</h4>
                                <p class="text-white position-relative">My POS (Point of Sales) adalah suatu sistem yang digunakan dalam kebutuhan berbagai macam usaha bisnis ritel untuk dapat mempermudah proses transaksi jual beli secara cepat, aman, dan sistematis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('master/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>
