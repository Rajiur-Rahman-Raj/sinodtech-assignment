<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $inventories = [

            // Dhaka Branch
            ['branch_id' => 1, 'product_id' => 1, 'quantity' => 15],
            ['branch_id' => 1, 'product_id' => 2, 'quantity' => 30],
            ['branch_id' => 1, 'product_id' => 3, 'quantity' => 25],
            ['branch_id' => 1, 'product_id' => 4, 'quantity' => 10],

            //Chattogram Branch
            ['branch_id' => 2, 'product_id' => 1, 'quantity' => 8],
            ['branch_id' => 2, 'product_id' => 5, 'quantity' => 20],
            ['branch_id' => 2, 'product_id' => 6, 'quantity' => 18],

            // Khulna Branch
            ['branch_id' => 3, 'product_id' => 2, 'quantity' => 12],
            ['branch_id' => 3, 'product_id' => 7, 'quantity' => 15],
            ['branch_id' => 3, 'product_id' => 8, 'quantity' => 22],
        ];

        foreach ($inventories as $inventory) {

            Inventory::create($inventory);

        }
    }
}
