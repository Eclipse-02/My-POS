@extends('layouts.master')

@section('title', 'Transaksi')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize text-center">Barang</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Merek</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Distributor</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Harga Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Stok</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangs as $b)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ ++$i }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->nama_barang }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->nama_merek }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->nama_distributor }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->harga_barang }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->stok }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" value="{{ $b->id }}" name="id">
                                                        <input type="hidden" value="{{ $b->nama_barang }}" name="name">
                                                        <input type="hidden" value="{{ $b->harga_barang }}" name="price">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button class="btn btn-info" type="submit">Add to Cart</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize text-center">Keranjang</h6>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger text-center" role="alert">
                        <h3 class="text-secondary">{{$errors->first()}}</h3>
                    </div>
                    @endif
                    <div class="card-body p-3">
                        <div class="chart">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Quantity</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Price</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="number" min="1" name="quantity" value="{{ $item->quantity }}"
                                                            class="text-center " style="width: 10%" />
                                                        <button type="submit"
                                                            class="btn btn-info">Update</button>
                                                    </form>
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->price }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="btn btn-warning">x</button>
                                                    </form>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Beli
                                </button>
                                </div>
                                <div class="col-6 d-flex flex-row-reverse">
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">Hapus Semua Barang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Keranjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex row">
                    <th>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Nama Barang</strong></p>
                            </td>
                        </div>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Total</strong></p>
                            </td>
                        </div>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Harga</strong></p>
                            </td>
                        </div>
                    </th>
                        @foreach ($cartItems as $item)
                        <tr>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">{{ $item->name }}</p>
                                </td>
                            </div>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">x{{ $item->quantity }}</p>
                                </td>
                            </div>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">{{ $item->quantity * $item->price }}</p>
                                </td>
                            </div>
                        </tr>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <h6>Total Harga: <strong>Rp.{{ Cart::getTotal() }}</strong></h6>
                        <h6>Total Barang: <strong>{{ Cart::getTotalQuantity()}}</strong></h6>
                    </div>
                    <form action="{{ route('cart.pay') }}" method="POST">
                        @csrf

                        <div class="form-group mt-4">
                            <input type="number" min="0" class="form-control" id="total_bayar" name="total_bayar"
                                placeholder="Total Bayar">
                            <button type="submit" class="btn btn-primary mt-2 mb-0">Bayar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
