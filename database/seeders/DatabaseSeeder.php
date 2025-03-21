<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AttributeSeeder::class,
            CategorySeeder::class,
            LanguageSeeder::class,
            LocationSeeder::class,
            WorkingJobSeeder::class,
        ]);


        DB::table('job_language')->insert([
            ['working_job_id' => 1, 'language_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 2, 'language_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed job_location pivot table
        DB::table('job_location')->insert([
            ['working_job_id' => 1, 'location_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 2, 'location_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 1, 'location_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed job_category pivot table
        DB::table('job_category')->insert([
            ['working_job_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 2, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('job_attribute_values')->insert([
            ['working_job_id' => 1, 'attribute_id' => 1, 'value' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 2, 'attribute_id' => 1, 'value' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['working_job_id' => 1, 'attribute_id' => 2, 'value' => 'full-time', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
