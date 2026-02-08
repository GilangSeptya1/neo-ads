<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pendidikan',
            'Media Percetakan atau Seni Grafis',
            'Kuliner',
            'Wisata & Hiburan',
            'Jasa',
            'Otomotif',
            'Retail/Supplier',
            'Telekomunikasi',
            'Layanan Keuangan',
            'Manufaktur',
            'Produk & Layanan Kecantikan',
            'Produk & Layanan Kesehatan',
            'Konstruksi',
            'Properti, Arsitektur, dan Interior',
            'Asuransi',
            'Layanan Logistik',
            'Tekstil & Fashion',
            'Periklanan',
            'Teknologi Informasi (IT)',
        ];

        foreach ($categories as $index => $name) {
            DB::table('customer_categories')->upsert([
                'id' => $index + 1, // auto-increment ID
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ], ['id'], ['name', 'updated_at']);
        }
    }
}
