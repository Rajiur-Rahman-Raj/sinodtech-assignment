<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([

            [
                'name' => 'Dell Inspiron 15',
                'sku' => 'LAP-1001',
                'price' => 65000,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Logitech Wireless Mouse',
                'sku' => 'MOU-1002',
                'price' => 1200,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Mechanical Keyboard',
                'sku' => 'KEY-1003',
                'price' => 3500,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '27 Inch Monitor',
                'sku' => 'MON-1004',
                'price' => 22000,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'HP Laser Printer',
                'sku' => 'PRI-1005',
                'price' => 18000,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '1TB SSD',
                'sku' => 'SSD-1006',
                'price' => 8500,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '16GB DDR4 RAM',
                'sku' => 'RAM-1007',
                'price' => 5200,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'WiFi Router',
                'sku' => 'NET-1008',
                'price' => 3200,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Web Camera',
                'sku' => 'CAM-1009',
                'price' => 2700,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'UPS 650VA',
                'sku' => 'UPS-1010',
                'price' => 4800,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
