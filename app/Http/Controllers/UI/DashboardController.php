<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function kain() {
        return view('pages.inventory.kain');
    }

    public function transaksiKain() {
        return view('pages.inventory.transaksi_kain');
    }

    public function induk() {
        return view('pages.inventory.induk');
    }

    public function barang() {
        return view('pages.inventory.barang');
    }

    public function penjahit() {
        return view('pages.produksi.penjahit');
    }

    public function wos() {
        return view('pages.produksi.wos');
    }

    public function pembayaran() {
        return view('pages.produksi.pembayaran');
    }

    public function pemesanan() {
        return view('pages.penjualan.pemesanan');
    }

    public function produk() {
        return view('pages.penjualan.produk');
    }

    public function settings() {
        return view('pages.settings.index');
    }

}
