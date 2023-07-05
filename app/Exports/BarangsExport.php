<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->nama_barang,
            $data->nama_merek,
            $data->nama_distributor,
            $data->harga_barang,
            $data->harga_beli,
            $data->stok,
            $data->tgl_masuk,
            $data->petugas
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Barang',
            'Nama Merek',
            'Nama Distributor',
            'Harga Barang',
            'Harga Beli',
            'Stok',
            'Tanggal Masuk',
            'Petugas'
        ];
    }
}
