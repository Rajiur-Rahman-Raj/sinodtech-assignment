<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([

            [
                'name' => 'Rahim Uddin',
                'email' => 'rahim@example.com',
                'phone' => '01710000001',
                'address' => 'Dhaka',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Abdus Salam',
                'email' => 'salam@example.com',
                'phone' => '01710078324',
                'address' => 'Dhaka',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Fazle Rabbi',
                'email' => 'rabbi@example.com',
                'phone' => '01789395930',
                'address' => 'Dhaka',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Kolim Uddin',
                'email' => 'kolim@example.com',
                'phone' => '01710000002',
                'address' => 'Chattogram',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Jubayer Islam',
                'email' => 'jubayer@example.com',
                'phone' => '01718625437',
                'address' => 'Chattogram',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jamal Hossain',
                'email' => 'jamal@example.com',
                'phone' => '01710000003',
                'address' => 'Khulna',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sakib Ahmed',
                'email' => 'sakib@example.com',
                'phone' => '01710000004',
                'address' => 'Rajshahi',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Nusrat Jahan',
                'email' => 'nusrat@example.com',
                'phone' => '01710000005',
                'address' => 'Sylhet',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
