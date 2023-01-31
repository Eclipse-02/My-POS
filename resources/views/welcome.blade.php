<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('master/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('master/assets/img/favicon.png') }}">
    <title>
        My POS
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
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="#">
                My POS
            </a>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0 ">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Halo Pengguna!</h1>
                        <p class="text-lead text-white">Ini adalah projek dari Praktik AAS (Asesmen Akhir Semester) SMK Wikrama 1 Garut TP 2023/2024</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="height: calc(80vh - 360px)">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Lanjut</h5>
                        </div>
                        <div class="row px-xl-5 px-sm-4 px-3">
                            <div class="mt-2 position-relative text-center">
                                <a href="{{ route('login') }}" class="btn btn-primary">Lanjut ke Sign In</a>
                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer pb-3">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary mt-3">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>. Created by R.U.A.S
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
