@extends('layouts.master')

@section('title', 'Transaksi')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit Transaksi</h3>
                </div>
                @if($errors->any())
                <div class="alert alert-danger text-center" role="alert">
                    <h3 class="text-secondary">{{$errors->first()}}</h3>
                </div>
                @endif
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_barang">Nama Barang</label>
                                    <select name="nama_barang" id="nama_barang" class="form-select">
                                        @foreach ($barangs as $b)
                                            <option value="{{ $b->nama_barang }}" @if($transaksi->nama_barang == $b->nama_barang) selected @endif>{{ $b->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="nama_barang">Harga Barang</label>
                                    <div id="harga">
                                    <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                        placeholder="Harga Barang" value="{{ $transaksi->harga_barang }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="total_barang">Total Barang</label>
                                    <input type="number" min="0" class="form-control" id="total_barang" name="total_barang"
                                        placeholder="Total Barang" value="{{ $transaksi->total_barang }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="total_bayar">Total Bayar</label>
                                    <input type="number" min="0" class="form-control" id="total_bayar" name="total_bayar"
                                        placeholder="Total Bayar" value="{{ $transaksi->total_bayar }}">
                                </div>
                            </div>
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

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_barang').on('change', function() {
            var namaBarang = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('getHarga') }}?nama_barang=' + namaBarang,
                dataType: 'json',
                success: function (response) {
                    $.each(response.hargas, function (key, item) {
                        $('#harga').empty();
                        $('#harga').append('<input class="form-control" id="harga_barang" name="harga_barang" value="'+ item.harga_barang +'" readonly>')
                        
                    });
                }
            });
        })
    });
</script>
@endsection