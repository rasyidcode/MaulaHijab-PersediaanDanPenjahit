<?php

namespace App\Exceptions;

use Exception;

class PenjahitNotFoundException extends Exception {
    
    public function report() {}

    public function render($request) {
        return response()->json([
            'status' => 404,
            'message' => 'Penjahit tidak dapat ditemukan!',
            'data' => null
        ], 404);
    }
}