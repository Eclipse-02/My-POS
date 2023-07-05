<?php

namespace App\Exports;

use App\Models\Merek;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class MereksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Merek::all();
    }

    public function map($data): array
    {
        return[
            $data->id,
            $data->nama_merek
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Merek'
        ];
    }
}
