<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([

            [
                'employee_id' => 'EMP-1001',
                'name' => 'Nayeem Hasan',
                'email' => 'nayeem@example.com',
                'phone' => '01810000001',
                'designation' => 'Sales Executive',
                'kpi_score' => 0,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'employee_id' => 'EMP-1002',
                'name' => 'Fahim Ahmed',
                'email' => 'fahim@example.com',
                'phone' => '01783267291',
                'designation' => 'Sales Executive',
                'kpi_score' => 0,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'employee_id' => 'EMP-1003',
                'name' => 'Tanvir Hossain',
                'email' => 'tanvir@example.com',
                'phone' => '01892626734',
                'designation' => 'Sales Executive',
                'kpi_score' => 0,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 'EMP-1004',
                'name' => 'Sojib Hasan',
                'email' => 'sojib@example.com',
                'phone' => '01856372786',
                'designation' => 'Inventory Auditor',
                'kpi_score' => 0,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
[
                'employee_id' => 'EMP-1005',
                'name' => 'Md Sahid',
                'email' => 'sahid@example.com',
                'phone' => '01783447654',
                'designation' => 'Purchase Officer',
                'kpi_score' => 0,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
