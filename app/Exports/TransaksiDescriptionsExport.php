<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class TransaksiDescriptionsExport implements FromQuery, WithHeadings, WithMapping
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Query
    */
    public function query()
    {
        return Transaksi::leftJoin('transaksi_descriptions', 'transaksis.id', '=', 'transaksi_descriptions.id')->select('transaksis.id', 'transaksis.total_harga', 'transaksis.total_bayar', 'transaksis.kembalian', 'transaksis.petugas', 'transaksis.tgl_beli', 'transaksi_descriptions.nama_barang', 'transaksi_descriptions.total_barang', 'transaksi_descriptions.harga_barang')->where('transaksis.id', $this->id);
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->total_barang,
            $data->total_harga,
            $data->total_bayar,
            $data->kembalian,
            $data->petugas,
            $data->tgl_beli,
            $data->nama_barang,
            $data->harga_barang,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Total Barang',
            'Total Harga',
            'Total Bayar',
            'Kembalian',
            'Petugas',
            'Tanggal Beli',
            'Nama Barang',
            'Harga Barang',
        ];
    }
}
