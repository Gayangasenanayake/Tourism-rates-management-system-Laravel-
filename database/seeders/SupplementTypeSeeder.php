<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Rates\Models\SupplementType;

class SupplementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            'meals' => 'Meals',
            'ai' => 'Ai',
            'festival' => 'Festival',
            'room' => 'Room',
            'early checkin' => 'Early checkin',
            'late checkout' => 'Late checkout',
        ];

        foreach ($roomTypes as $key => $value) {
            SupplementType::create([// Assuming you want to set the ID manually
                'title' => $value,
            ]);
        }
    }
}
