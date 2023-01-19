@extends('layouts.master')

@section('title', 'Barang')

@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h3 class="text-capitalize">Data Barang</h3>
                <p class="text-sm mb-0">
                    <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create</a>
                </p>
            </div>
            <div class="container">
                <div class="card-body p-3">                
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Nama Merek</th>
                                <th>Nama Distributor</th>
                                <th>Harga Barang</th>
                                <th>Harga Beli</th>
                                <th>Stok</th>
                                <th>Tanggal Masuk</th>
                                <th>Petugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('barangs.index') }}",
            columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "nama_barang",
                    name: "nama_barang"
                },
                {
                    data: "nama_merek",
                    name: "nama_merek"
                },
                {
                    data: "nama_distributor",
                    name: "nama_distributor"
                },
                {
                    data: "harga_barang",
                    name: "harga_barang"
                },
                {
                    data: "harga_beli",
                    name: "harga_beli"
                },
                {
                    data: "stok",
                    name: "stok"
                },
                {
                    data: "tgl_masuk",
                    name: "tgl_masuk"
                },
                {
                    data: "petugas",
                    name: "petugas"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#example').on('click', '.delete[data-remote]', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            // confirm then
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    method: '_DELETE',
                    submit: true
                }
            }).always(function(data) {
                $('#example').DataTable().draw(false);
            });
        });
    });
</script>
@endsection