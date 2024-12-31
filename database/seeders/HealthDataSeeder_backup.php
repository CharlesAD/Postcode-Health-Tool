<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HealthDataSeeder extends Seeder
{
    public function run()
    {
        $filePath = storage_path('app/health_conditions_constituency.csv'); // Ensure the CSV is in the storage/app folder

        // Open the CSV and process rows
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle); // Read the header row

            while (($row = fgetcsv($handle)) !== false) {
                DB::table('health_data')->insert([
                    'pcon_code' => $row[1],
                    'pcon_name' => $row[2],
                    'group_code' => $row[3],
                    'prevalence_percentage' => $row[4],
                    'condition' => $row[5],
                    'description' => $row[6],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            fclose($handle);
        }
    }
}
