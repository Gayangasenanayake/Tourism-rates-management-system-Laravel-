<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Rates\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            'single' => 'Single',
            'double' => 'Double',
            'triple' => 'Triple',
            'twin' => 'Twin',
            'guide' => 'Guide',
        ];

        foreach ($roomTypes as $key => $value) {
            RoomType::create([// Assuming you want to set the ID manually
                'title' => $value,
            ]);
        }
    }
}
