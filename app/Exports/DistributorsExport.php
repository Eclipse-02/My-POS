<?php

namespace App\Exports;

use App\Models\Distributor;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class DistributorsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Distributor::all();
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->nama_distributor,
            $data->alamat,
            $data->no_hp
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Distributor',
            'Alamat',
            'No Hp'
        ];
    }
}
