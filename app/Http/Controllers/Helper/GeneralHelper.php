<?php

namespace App\Http\Controllers\Helper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Repositories\TransaksiKain\TransaksiKainRepositoryInterface as TransaksiKainRepo;
use App\Repositories\Kain\KainRepositoryInterface as KainRepo;
use App\Repositories\Induk\IndukRepositoryInterface as IndukRepo;
use App\Repositories\Barang\BarangRepositoryInterface as BarangRepo;
use App\Repositories\Penjahit\PenjahitRepositoryInterface as PenjahitRepo;
use App\Repositories\Wos\WosRepositoryInterface as WosRepo;

class GeneralHelper {

    public static function send_response(int $code, string $message, $data) : JsonResponse {
        if ($code != 200 && $code != 201) {
            return response()->json([
                "status" => $code,
                "message" => $message,
                "errors" => $data
            ], $code);
        } else {
            return response()->json([
                "status" => $code,
                "message" => $message,
                "data" => $data
            ], $code);
        }
    }

    public static function send_datatable_response(Request $request, int $recordsTotal, int $recordsFiltered, object $data) : JsonResponse {
        return response()->json([
            'draw' => $request->has('draw') ? intval($request->draw) : 0,
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data,
            'request' => $request->all()
        ]);
    }

    public static function isKainExist(KainRepo $kainRepo, string $kode) {
        $checkData = $kainRepo->get($kode);
        if ($checkData == null) {
            throw new \App\Exceptions\KainNotFoundException;
        }
    }

    public static function isTransaksiKainExist(TransaksiKainRepo $transaksiKainRepo, int $id) {
        $checkData = $transaksiKainRepo->get($id);
        if ($checkData == null) {
            throw new \App\Exceptions\TransaksiKainNotFoundException;
        }
    }

    public static function isIndukExist(IndukRepo $indukRepo, string $kode) {
        $checkData = $indukRepo->get($kode);
        if ($checkData == null) {
            throw new \App\Exceptions\IndukNotFoundException;
        }
    }

    public static function isBarangExist(BarangRepo $barangRepo, string $kode) {
        $checkData = $barangRepo->get($kode);
        if ($checkData == null) {
            throw new \App\Exceptions\BarangNotFoundException;
        }
    }

    public static function isPenjahitExist(PenjahitRepo $penjahitRepo, string $noKtp) {
        $checkData = $penjahitRepo->get($noKtp);
        if ($checkData == null) {
            throw new \App\Exceptions\PenjahitNotFoundException;
        }
    }

    public static function isWosExist(WosRepo $wosRepo, int $id) {
        $checkData = $wosRepo->get($id);
        if ($checkData == null) {
            throw new \App\Exceptions\WosNotFoundException;
        }
    }

}