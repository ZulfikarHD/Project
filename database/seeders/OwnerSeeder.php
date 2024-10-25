<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            'name'  => 'admin',
            'email' => 'admin@admin.com',
            'phone_number'  => '08123456789',
            'business_name' => 'Tester',
            'password'  => Hash::make('admin123')
        ]);

        User::create([
            'name'  => 'admin',
            'email' => 'admin@admin.com',
            'phone_number'  => '08123456789',
            'password'  => Hash::make('admin123')
        ]);
    }
}
