<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::insert([
            [
                'name' => 'Dhaka Branch',
                'code' => 'DHK',
                'address' => 'Gulshan, Dhaka',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chattogram Branch',
                'code' => 'CTG',
                'address' => 'Agrabad, Chattogram',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khulna Branch',
                'code' => 'KHL',
                'address' => 'Khulna',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
