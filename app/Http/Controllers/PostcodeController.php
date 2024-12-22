<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostcodeController extends Controller
{
    public function lookup($postcode)
    {
        // Call the Postcodes.io API
        $response = Http::get("https://api.postcodes.io/postcodes/{$postcode}");

        if ($response->successful()) {
            $data = $response->json();

            // Extract constituency information
            $constituency = $data['result']['parliamentary_constituency'];

            return response()->json([
                'postcode' => $postcode,
                'constituency' => $constituency,
            ]);
        }

        // Handle errors
        return response()->json(['error' => 'Invalid postcode or not found'], 404);
    }
}
