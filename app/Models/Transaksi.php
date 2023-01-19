<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'total_barang',
        'total_harga',
        'total_bayar',
        'kembalian',
        'tgl_beli',
    ];
}
