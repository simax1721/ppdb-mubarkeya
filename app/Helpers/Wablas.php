<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Wablas
{
    public static function kirimPesan($phone, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => env('WABLAS_API_KEY')
        ])->post(env('WABLAS_ENDPOINT'), [
            'phone' => $phone, // Format: 628xxxxx
            'message' => $message
        ]);

        return $response->json();
    }
}
