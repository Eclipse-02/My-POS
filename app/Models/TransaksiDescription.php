<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransaksiDescription extends Model
{
    use HasFactory;
    protected $table = 'transaksi_descriptions';
    protected $fillable = [
        'nama_barang',
        'total_barang',
        'harga_barang',
        'kembali',
        'tgl_beli',
        'petugas'
    ];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
