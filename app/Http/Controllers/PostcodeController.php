<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

            Log::info('Constituency from API:', ['constituency' => $constituency]);

            $healthData = DB::table('health_data')
                ->whereRaw('LOWER(TRIM(pcon_name)) = ?', [strtolower(trim($constituency))])
                ->select('condition', 'prevalence_percentage', 'description')
                ->get();

            Log::info('Database query result:', ['data' => $healthData]);

            return response()->json([
                'postcode' => $postcode,
                'constituency' => $constituency,
                'health_data' => $healthData,
            ]);
        }

        // Handle errors
        return response()->json(['error' => 'Invalid postcode or not found'], 404);
    }
}
