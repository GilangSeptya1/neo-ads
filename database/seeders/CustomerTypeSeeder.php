<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $customerTypes = [
            ['id' => 1, 'name' => 'PT', 'remarks' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'UMKM', 'remarks' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name' => 'Agensi', 'remarks' => null, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'name' => 'Perorangan', 'remarks' => null, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('customer_types')->upsert($customerTypes, ['id'], ['name', 'remarks', 'updated_at']);
    }
}
