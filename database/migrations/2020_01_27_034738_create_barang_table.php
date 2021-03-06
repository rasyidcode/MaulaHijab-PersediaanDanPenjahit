<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_induk');
            $table->string('warna');
            $table->bigInteger('stok_ready');
            $table->bigInteger('treshold');
            $table->timestamps();

            $table->foreign('kode_induk')->references('kode')->on('induk');
        });
    }

    /**
     * Reverse the migrations.`
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
