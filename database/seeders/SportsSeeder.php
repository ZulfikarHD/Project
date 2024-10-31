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
            [
                'name'  => 'Sepak Bola',
                'icon' => '/storage/sports-svg/bola.svg'
            ],
            [
                'name'  => 'Futsal',
                'icon' => '/storage/sports-svg/bola.svg'
            ],
            [
                'name'  => 'Bulu Tangkis',
                'icon' => '/storage/sports-svg/badminton.svg'
            ],
            [
                'name'  => 'Tenis',
                'icon' => '/storage/sports-svg/badminton.svg'
            ],
            [
                'name'  => 'Basket',
                'icon' => '/storage/sports-svg/basket.svg'
            ],
            [
                'name'  => 'Tenis Meja',
                'icon' => '/storage/sports-svg/tenis-meja.svg'
            ],
            [
                'name'  => 'Voli',
                'icon' => '/storage/sports-svg/bola.svg'
            ],
            [
                'name'  => 'Golf',
                'icon' => '/storage/sports-svg/golf.svg'
            ],
            [
                'name'  => 'Bowling',
                'icon' => '/storage/sports-svg/bowling.svg'
            ],
            [
                'name'  => 'Hoki',
                'icon' => '/storage/sports-svg/golf.svg'
            ],
            [
                'name'  => 'Billiar',
                'icon' => '/storage/sports-svg/bola.svg'
            ],
            [
                'name'  => 'Fitness',
                'icon' => '/storage/sports-svg/fintess.svg'
            ],
            [
                'name'  => 'Senam',
                'icon' => '/storage/sports-svg/senam.svg'
            ],
            [
                'name'  => 'Panahan',
                'icon' => '/storage/sports-svg/panahan.svg'
            ],
        ]);
    }
}
