<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Travel;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $travelOptions = [
            [
                'name' => 'Economy Car',
                'price' => 300000,
                'price_per_km' => 5000,
                'description' => 'Comfortable economy car for budget travelers. Suitable for 4 passengers with 2 luggage.',
            ],
            [
                'name' => 'Minibus',
                'price' => 500000,
                'price_per_km' => 8000,
                'description' => 'Spacious minibus perfect for group travel. Capacity up to 12 passengers with AC.',
            ],
            [
                'name' => 'Luxury Van',
                'price' => 800000,
                'price_per_km' => 12000,
                'description' => 'Premium van with luxury seats and entertainment system. Suitable for 7 passengers.',
            ],
            [
                'name' => 'Tour Bus',
                'price' => 1500000,
                'price_per_km' => 15000,
                'description' => 'Large tour bus with restroom facilities. Perfect for big groups up to 40 passengers.',
            ],
            [
                'name' => 'SUV 4x4',
                'price' => 600000,
                'price_per_km' => 10000,
                'description' => 'Rugged SUV for mountain terrain and off-road destinations. Capacity 6 passengers.',
            ],
        ];

        foreach ($travelOptions as $option) {
            Travel::create($option);
        }
    }
}
