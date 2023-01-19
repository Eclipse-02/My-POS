<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'nama_merek',
        'nama_distributor',
        'harga_barang',
        'harga_beli',
        'stok',
        'tgl_masuk',
        'petugas',
    ];
}
