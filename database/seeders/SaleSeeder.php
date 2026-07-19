<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        Sale::insert([
            [
                'invoice_no' => 'INV-20260701-00001',
                'branch_id' => 1,
                'customer_id' => 1,
                'sale_date' => now()->subDays(10),
                'grand_total' => 67400,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_no' => 'INV-20260301-00002',
                'branch_id' => 2,
                'customer_id' => 2,
                'sale_date' => now()->subDays(130),
                'grand_total' => 101000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_no' => 'INV-20260710-00003',
                'branch_id' => 1,
                'customer_id' => 3,
                'sale_date' => now()->subDays(5),
                'grand_total' => 5200,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_no' => 'INV-20260210-00004',
                'branch_id' => 3,
                'customer_id' => 4,
                'sale_date' => now()->subDays(170),
                'grand_total' => 6400,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_no' => 'INV-20260715-00005',
                'branch_id' => 2,
                'customer_id' => 5,
                'sale_date' => now()->subDays(2),
                'grand_total' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_no' => 'INV-20260120-00006',
                'branch_id' => 1,
                'customer_id' => 6,
                'sale_date' => now()->subDays(180),
                'grand_total' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
