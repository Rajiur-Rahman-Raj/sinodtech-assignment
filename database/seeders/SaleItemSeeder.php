<?php

namespace Database\Seeders;

use App\Models\SaleItem;
use Illuminate\Database\Seeder;

class SaleItemSeeder extends Seeder
{
    public function run(): void
    {
        SaleItem::insert([
            [
                'sale_id'=>1,
                'product_id'=>1,
                'quantity'=>1,
                'unit_price'=>65000,
                'subtotal'=>65000,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sale_id'=>1,
                'product_id'=>2,
                'quantity'=>2,
                'unit_price'=>1200,
                'subtotal'=>2400,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'sale_id'=>2,
                'product_id'=>1,
                'quantity'=>1,
                'unit_price'=>65000,
                'subtotal'=>65000,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sale_id'=>2,
                'product_id'=>5,
                'quantity'=>2,
                'unit_price'=>18000,
                'subtotal'=>36000,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'sale_id'=>3,
                'product_id'=>7,
                'quantity'=>1,
                'unit_price'=>5200,
                'subtotal'=>5200,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'sale_id'=>4,
                'product_id'=>8,
                'quantity'=>2,
                'unit_price'=>3200,
                'subtotal'=>6400,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'sale_id'=>5,
                'product_id'=>5,
                'quantity'=>1,
                'unit_price'=>18000,
                'subtotal'=>18000,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'sale_id'=>6,
                'product_id'=>6,
                'quantity'=>1,
                'unit_price'=>8500,
                'subtotal'=>8500,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

        ]);
    }
}
