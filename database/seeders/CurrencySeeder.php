<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Rates\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            'usd' => '$',
            'euro' => '€',
        ];

        foreach ($roomTypes as $key => $value) {
            Currency::create([// Assuming you want to set the ID manually
                'name' => $key,
                'iso_code' => $value,
            ]);
        }
    }
}
