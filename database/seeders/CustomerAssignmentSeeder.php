<?php

namespace Database\Seeders;

use App\Models\CustomerAssignment;
use Illuminate\Database\Seeder;

class CustomerAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerAssignment::insert([
            [
                'customer_id' => 2,
                'employee_id' => 1,
                'assigned_at' => now()->subDays(15),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'customer_id' => 6,
                'employee_id' => 1,
                'assigned_at' => now()->subDays(20),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'customer_id' => 8,
                'employee_id' => 2,
                'assigned_at' => now()->subDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
