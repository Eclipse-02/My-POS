<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_descriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("total_barang");
            $table->bigInteger("total_bayar");
            $table->bigInteger("total_harga");
            $table->bigInteger("kembalian");
            $table->date("tgl_beli");
            $table->string("petugas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_descriptions');
    }
};
