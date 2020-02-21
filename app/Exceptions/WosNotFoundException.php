<?php

namespace App\Exceptions;

use Exception;

class WosNotFoundException extends Exception {
    
    public function report() {}

    public function render($request) {
        return response()->json([
            'status' => 404,
            'message' => 'Wos tidak dapat ditemukan!',
            'data' => null
        ], 404);
    }
}
