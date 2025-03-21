<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $attributes = [
            ['name' => 'years_experience', 'type' => 'number', 'options' => null],
            ['name' => 'location_preference', 'type' => 'select', 'options' => json_encode(['Remote', 'On-site', 'Hybrid'])],
            ['name' => 'availability', 'type' => 'boolean', 'options' => null],
            ['name' => 'education_level', 'type' => 'select', 'options' => json_encode(['High School', 'Associate', 'Bachelor', 'Master', 'PhD'])],
        ];

        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
