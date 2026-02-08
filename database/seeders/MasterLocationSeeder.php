<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\MasterProvince as Province;
use App\Models\MasterCity as City;
use App\Models\MasterDistrict as District;
use App\Models\MasterSubdistrict as Subdistrict;

class MasterLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/data/provinces.csv');
        
        if (!file_exists($csvFile)) {
            $this->command->error("CSV file not found: {$csvFile}");
            return;
        }

        // Disable foreign key checks for faster import
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Truncate table
        Province::truncate();

        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file, 0, ';'); // Skip header row
        
        $provinces = [];
        $now = now();
        
        while (($row = fgetcsv($file, 0, ';')) !== false) {
            $provinces[] = [
                'id' => $row[0],
                'name' => $row[1],
                'code' => $row[2],         
                'created_at' => $now,
                'updated_at' => $now,
            ];
            
            // Insert in chunks of 100
            if (count($provinces) >= 100) {
                Province::insert($provinces);
                $provinces = [];
            }
        }
        
        // Insert remaining
        if (!empty($provinces)) {
            Province::insert($provinces);
        }
        
        fclose($file);
        $this->command->info('Provinces seeded successfully!');
        
        //-----------------------------------------------------------
        $csvFile = database_path('seeders/data/cities.csv');
        
        if (!file_exists($csvFile)) {
            $this->command->error("CSV file not found: {$csvFile}");
            return;
        }

        City::truncate();

        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file, 0, ';');
        
        $cities = [];
        $now = now();
        $chunkSize = 500;
        
        while (($row = fgetcsv($file, 0, ';')) !== false) {
            $cities[] = [
                'id' => $row[0],
                'province_id' => $row[1],
                'name' => $row[2],
                'code' => $row[3],
                'created_at' => $now,
                'updated_at' => $now,
            ];
            
            if (count($cities) >= $chunkSize) {
                City::insert($cities);
                $cities = [];
            }
        }
        
        if (!empty($cities)) {
            City::insert($cities);
        }
        
        fclose($file);
        
        $this->command->info('Cities seeded successfully!');  

        //-----------------------------------------------------------
        $csvFile = database_path('seeders/data/districts.csv');
        
        if (!file_exists($csvFile)) {
            $this->command->error("CSV file not found: {$csvFile}");
            return;
        }

        District::truncate();

        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file, 0, ';');
        
        $districts = [];
        $now = now();
        $chunkSize = 1000;
        
        while (($row = fgetcsv($file, 0, ';')) !== false) {
            $districts[] = [
                'id' => $row[0],
                'city_id' => $row[1],
                'name' => $row[2],
                'code' => $row[3],
                'created_at' => $now,
                'updated_at' => $now,
            ];
            
            if (count($districts) >= $chunkSize) {
                District::insert($districts);
                $districts = [];
                $this->command->info('Inserted ' . $chunkSize . ' districts...');
            }
        }
        
        if (!empty($districts)) {
            District::insert($districts);
        }
        
        fclose($file);
        
        $this->command->info('Districts seeded successfully!');
        
        //-----------------------------------------------------------
        $csvFile = database_path('seeders/data/subdistricts.csv');
        
        if (!file_exists($csvFile)) {
            $this->command->error("CSV file not found: {$csvFile}");
            return;
        }

        Subdistrict::truncate();

        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file, 0, ';');
        
        $subdistricts = [];
        $now = now();
        $chunkSize = 2000;
        $totalInserted = 0;
        
        while (($row = fgetcsv($file, 0, ';')) !== false) {
            $subdistricts[] = [
                'id' => $row[0],
                'district_id' => $row[1],
                'name' => $row[2],
                'postal_code' => $row[3],
                'code' => $row[4],
                'created_at' => $now,
                'updated_at' => $now,
            ];
            
            if (count($subdistricts) >= $chunkSize) {
                Subdistrict::insert($subdistricts);
                $totalInserted += count($subdistricts);
                $subdistricts = [];
                $this->command->info("Inserted {$totalInserted} subdistricts...");
            }
        }
        
        if (!empty($subdistricts)) {
            Subdistrict::insert($subdistricts);
            $totalInserted += count($subdistricts);
        }
        
        fclose($file);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->command->info("Total subdistricts seeded: {$totalInserted}");
    }
}