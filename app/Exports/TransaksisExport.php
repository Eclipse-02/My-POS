<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksisExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->total_barang,
            $data->harga_barang,
            $data->total_barang * $data->harga_barang,
            $data->petugas,
            $data->tgl_beli
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Total Barang',
            'Harga Barang',
            'Total Harga',
            'Petugas',
            'Tanggal Beli'
        ];
    }
}
