<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang');
            $table->bigInteger('id_transaksi_kain')->unsigned();
            $table->bigInteger('yard');
            $table->bigInteger('pcs');
            $table->timestamp('tanggal_ambil')->nullable();
            $table->timestamp('tanggal_kembali')->nullable();
            $table->bigInteger('jumlah_kembali')->default(0);
            $table->boolean('status_jahit')->default(0); // false = (pcs != jumlah_kembali), true = (pcs == jumlah_kembali && !(pcs > jumlah_kembali))
            $table->boolean('status_bayar')->default(0); // false = belum bayar, true = sudah bayar
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('no_ktp_penjahit')->nullable();
            $table->timestamps();

            $table->foreign('no_ktp_penjahit')->references('no_ktp')->on('penjahit');
            $table->foreign('kode_barang')->references('kode')->on('barang');
            $table->foreign('id_transaksi_kain')->references('id')->on('transaksi_kain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wos');
    }
}
