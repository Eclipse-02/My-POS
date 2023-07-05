@extends('layouts.master')

@section('title', 'Distributor')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Create Distributor</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('distributors.store') }}" method="POST">
                            @csrf

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_distributor">Nama Distributor</label>
                                    <input type="text" class="form-control @error('nama_distributor') is-invalid @enderror" id="nama_distributor" name="nama_distributor"
                                        placeholder="Nama Distributor">
                                        @error('nama_distributor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="alamat">Alamat</label>
                                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                        placeholder="Alamat"></textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="no_hp">No HP</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-white bg-primary" id="no_hp">+62</span>
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror ps-1" id="no_hp" name="no_hp"
                                        aria-describedby="no_hp">
                                    </div>
                                        @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="text-center">
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
