@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    @role('admin')
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Ada</p>
                            <h5 class="font-weight-bolder">
                                {{ $mereks }}
                            </h5>
                            <p class="mb-0">
                                Merek
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Ada</p>
                            <h5 class="font-weight-bolder">
                                {{ $distributors }}
                            </h5>
                            <p class="mb-0">
                                Distributor
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Ada</p>
                            <h5 class="font-weight-bolder">
                                {{ $barangs }}
                            </h5>
                            <p class="mb-0">
                                Barang
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Ada</p>
                            <h5 class="font-weight-bolder">
                                {{ $transaksis }}
                            </h5>
                            <p class="mb-0">
                                Transaksi
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role('kasir')
    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Ada</p>
                            <h5 class="font-weight-bolder">
                                {{ $transaksis }}
                            </h5>
                            <p class="mb-0">
                                Transaksi
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h3 class="text-capitalize"><span id="greet"></span> {{ auth()->user()->name }}</h3>
                <h6 class="text-capitalize">Bagaimana kabar anda hari ini?</h6>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h4 class="text-capitalize">Area Notifikasi</h4>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    @if ($notifikasi->count() != 0)
                        @foreach ($notifikasi as $n)
                            @if ($n->stok <= 5 && $n->stok >= 1)
                                <div class="col-12">
                                    <div class="mx-3 my-2 px-2 py-1 bg-warning rounded row">
                                        <div class="col-1 d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <style>svg{fill:#ffffff}</style>
                                                <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                                            </svg>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-white m-0">Stok barang {{ $n->nama_barang }} tinggal {{ $n->stok }} lagi!</h6>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($n->stok == 0)
                                <div class="col-12">
                                    <div class="mx-3 my-2 px-2 py-1 bg-danger rounded row">
                                        <div class="col-1 d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <style>svg{fill:#ffffff}</style>
                                                <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                                            </svg>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-white m-0">Stok barang {{ $n->nama_barang }} sudah habis!</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="mx-3 my-2 px-2 py-1 bg-success rounded row">
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <style>svg{fill:#ffffff}</style>
                                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <h6 class="text-white m-0">Tidak ada kekurangan stok barang!</h6>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var now = new Date();
    var hrs = now.getHours();
    var msg = "";

    if (hrs >  6) msg = "Selamat Pagi, ";      // After 6am
    if (hrs > 12) msg = "Selamat Siang, ";    // After 12pm
    if (hrs > 17) msg = "Selamat Sore, ";      // After 5pm
    if (hrs > 22) msg = "Selamat Malam, ";      // After 5pm

    document.getElementById('greet').innerHTML = msg;
</script>
@endsection