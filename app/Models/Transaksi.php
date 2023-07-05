<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_barang',
        'harga_barang',
        'total_barang',
        'petugas',
        'tgl_beli'
    ];

    public function transaksidescription(): HasOne
    {
        return $this->hasOne(TransaksiDescription::class);
    }
}
