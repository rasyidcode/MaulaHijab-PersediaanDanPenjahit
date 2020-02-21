<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('induk', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_jenis_bahan');
            $table->bigInteger('harga_jahit');
            $table->bigInteger('harga_basic');
            $table->bigInteger('hpp_shopee');
            $table->bigInteger('hpp_lazada');
            $table->bigInteger('dfs_shopee');
            $table->bigInteger('dfs_lazada');
            $table->timestamps();

            $table->foreign('kode_jenis_bahan')->references('kode')->on('jenis_bahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('induk');
    }
}
