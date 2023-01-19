@extends('layouts.master')

@section('title', 'Barang')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit Barang</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        placeholder="Nama Barang" value="{{ $barang->nama_barang }}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_merek">Nama Merek</label>
                                    <select name="nama_merek" id="nama_merek" class="form-select">
                                        @foreach ($merek as $m)
                                            <option value="{{ $m->nama_merek }}" @if($m->nama_merek == $barang->nama_merek) selected @endif>{{ $m->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_distributor">Nama Distributor</label>
                                    <select name="nama_distributor" id="nama_distributor" class="form-select">
                                        @foreach ($distributor as $d)
                                            <option value="{{ $d->nama_distributor }}" @if($d->nama_distributor == $barang->nama_distributor) selected @endif>{{ $d->nama_distributor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="harga_barang">Harga Barang</label>
                                    <input type="number" min="0" class="form-control" id="harga_barang" name="harga_barang"
                                        placeholder="Harga Barang" value="{{ $barang->harga_barang }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="harga_beli">Harga Beli</label>
                                    <input type="number" min="0" class="form-control" id="harga_beli" name="harga_beli"
                                        placeholder="Harga Beli" value="{{ $barang->harga_beli }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="stok">Stok</label>
                                    <input type="number" min="0" class="form-control" id="stok" name="stok"
                                        placeholder="Stok" value="{{ $barang->stok }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                        placeholder="Tanggal Masuk" value="{{ $barang->tanggal_masuk }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="petugas" name="petugas"
                                        placeholder="Petugas" value="{{ $barang->petugas }}">
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection