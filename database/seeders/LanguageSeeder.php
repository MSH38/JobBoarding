<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $languages = [
            'PHP',
            'JavaScript',
            'Python',
            'Ruby',
            'Java',
            'Go',
            'Swift',
            'Kotlin',
            'C#',
            'C++'
        ];

        foreach ($languages as $language) {
            Language::create([
                'name' => $language,
            ]);
        }
    }
}
