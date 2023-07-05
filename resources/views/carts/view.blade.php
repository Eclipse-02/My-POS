<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row align-content-center justify-content-center align-items-center vh-100 text-center position-relative">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-12 my-4">
                                <a class="navbar-brand m-0" href="{{ url('/') }}"
                                    target="_self">
                                    <img src="{{ asset('master/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img" style="width: 5vw!important" alt="main_logo">
                                    <span class="ms-1 font-weight-bold">My POS</span>
                                </a>
                            </div>
                            <div class="col-4 mb-2">
                                {{ $desc->id }}
                            </div>
                            <div class="col-4 mb-2">
                                {{ $desc->tgl_beli }}
                            </div>
                            <div class="col-4 mb-2">
                                {{ $desc->petugas }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-3 mb-2 pb-2 border-bottom border-secondary-subtle">
                                Nama
                            </div>
                            <div class="col-3 mb-2 pb-2 border-bottom border-secondary-subtle">
                                Jumlah
                            </div>
                            <div class="col-3 mb-2 pb-2 border-bottom border-secondary-subtle">
                                Harga
                            </div>
                            <div class="col-3 mb-2 pb-2 border-bottom border-secondary-subtle">
                                Subtotal
                            </div>
                            @foreach ($trans as $t)
                                <div class="col-3 mb-1">
                                    {{ $t->nama_barang }}
                                </div>
                                <div class="col-3 mb-1">
                                    {{ $t->total_barang }}
                                </div>
                                <div class="col-3 mb-1">
                                    {{ $t->harga_barang }}
                                </div>
                                <div class="col-3 mb-1">
                                    {{ $t->total_barang * $t->harga_barang }}
                                </div>
                            @endforeach
                            <div class="col-9 pt-2 mt-2 text-end border-top border-secondary-subtle">
                                Total Harga :
                            </div>
                            <div class="col-3 pt-2 mt-2 border-top border-secondary-subtle">
                                {{ $desc->total_harga }}
                            </div>
                            <div class="col-9 pt-2 mt-2 text-end border-top border-secondary-subtle">
                                Bayar :
                            </div>
                            <div class="col-3 pt-2 mt-2 border-top border-secondary-subtle">
                                {{ $desc->total_bayar }}
                            </div>
                            <div class="col-9 pt-1 mt-1 text-end">
                                Kembalian :
                            </div>
                            <div class="col-3 pt-1 mt-1">
                                {{ $desc->kembalian }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>