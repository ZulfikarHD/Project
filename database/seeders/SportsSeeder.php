<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sport::insert([
            ['name'  => 'Futsal'],
            ['name'  => 'Voli'],
            ['name'  => 'Sepak Bola'],
            ['name'  => 'Bulu Tangkis'],
            ['name'  => 'Tenis'],
        ]);
    }
}
