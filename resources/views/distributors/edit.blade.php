@extends('layouts.master')

@section('title', 'Distributor')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit Distributor</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_distributor">Nama Distributor</label>
                                    <input type="text" class="form-control @error('nama_distributor') has-error @enderror" id="nama_distributor" name="nama_distributor"
                                    placeholder="Nama Distributor" value="{{ $distributor->nama_distributor }}">
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
                                    <textarea type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat">{{ $distributor->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="no_hp">No HP</label>
                                    <input type="number" min="0" max="9999999999999" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="No HP" value="{{ $distributor->no_hp }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection