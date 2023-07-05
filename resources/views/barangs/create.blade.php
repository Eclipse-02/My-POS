@extends('layouts.master')

@section('title', 'Barang')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Create Barang</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('barangs.store') }}" method="POST">
                            @csrf

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang"
                                        placeholder="Nama Barang">
                                        @error('nama_barang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_merek">Nama Merek</label>
                                    <select name="nama_merek" id="nama_merek" class="form-select @error('nama_merek') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Merek</option>
                                        @foreach ($merek as $m)
                                            <option value="{{ $m->nama_merek }}">{{ $m->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_merek')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_distributor">Nama Distributor</label>
                                    <select name="nama_distributor" id="nama_distributor" class="form-select @error('nama_distributor') is-invalid @enderror">
                                        <option value="" selected disabled>Nama Distributor</option>
                                        @foreach ($distributor as $d)
                                            <option value="{{ $d->nama_distributor }}">{{ $d->nama_distributor }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_distributor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="harga_barang">Harga Barang</label>
                                    <input type="number" min="0" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang"
                                        placeholder="Harga Barang">
                                        @error('harga_barang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="harga_beli">Harga Beli</label>
                                    <input type="number" min="0" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli"
                                        placeholder="Harga Beli">
                                        @error('harga_beli')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="stok">Stok</label>
                                    <input type="number" min="0" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                                        placeholder="Stok">
                                        @error('stok')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                                <button type="submit"
                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
