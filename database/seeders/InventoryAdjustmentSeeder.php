<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventoryAdjustmentSeeder extends Seeder
{
    public function run(): void
    {
        Inventory::where('branch_id',1)->where('product_id',1)->decrement('quantity',2);
        Inventory::where('branch_id',1)->where('product_id',2)->decrement('quantity',2);
        Inventory::where('branch_id',1)->where('product_id',6)->decrement('quantity',1);

        Inventory::where('branch_id',2)->where('product_id',1)->decrement('quantity',1);
        Inventory::where('branch_id',2)->where('product_id',5)->decrement('quantity',3);

        Inventory::where('branch_id',3)->where('product_id',8)->decrement('quantity',2);
        Inventory::where('branch_id',3)->where('product_id',7)->decrement('quantity',1);
    }
}
