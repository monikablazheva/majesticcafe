<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quantity_type;

class Quantity_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantity_types = [
            'литър',
            'милилитри',
            'грамове',
            'брой'
        ];

        foreach ($quantity_types as $quantity_type) {
            Quantity_type::factory()->create(['name' => $quantity_type]);
        }
    }
}
