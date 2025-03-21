<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkingJob;

class WorkingJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jobs = [
            [
                'title' => 'Full Stack Developer',
                'description' => 'A full-stack developer responsible for both frontend and backend development.',
                'company_name' => 'TechCorp',
                'salary_min' => 60000.00,
                'salary_max' => 90000.00,
                'is_remote' => true,
                'job_type' => 'full-time',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Junior Developer',
                'description' => 'A junior developer role focusing on backend development.',
                'company_name' => 'DevWorks',
                'salary_min' => 45000.00,
                'salary_max' => 60000.00,
                'is_remote' => false,
                'job_type' => 'full-time',
                'status' => 'draft',
                'published_at' => null,
            ],
            [
                'title' => 'backend Developer',
                'description' => 'A full-stack developer responsible for both frontend and backend development.',
                'company_name' => 'TechCorp',
                'salary_min' => 60000.00,
                'salary_max' => 90000.00,
                'is_remote' => true,
                'job_type' => 'full-time',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Junior .net Developer',
                'description' => 'A junior .net developer role focusing on backend development.',
                'company_name' => 'DevWorks',
                'salary_min' => 45000.00,
                'salary_max' => 60000.00,
                'is_remote' => false,
                'job_type' => 'full-time',
                'status' => 'draft',
                'published_at' => null,
            ],
            [
                'title' => 'PHP Developer',
                'description' => 'A PHP developer responsible for both frontend and backend development.',
                'company_name' => 'TechCorp',
                'salary_min' => 60000.00,
                'salary_max' => 90000.00,
                'is_remote' => true,
                'job_type' => 'part-time',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Junior PHP Developer',
                'description' => 'A junior php developer role focusing on backend development.',
                'company_name' => 'DevWorks',
                'salary_min' => 45000.00,
                'salary_max' => 60000.00,
                'is_remote' => false,
                'job_type' => 'part-time',
                'status' => 'draft',
                'published_at' => now(),
            ],
        ];

        foreach ($jobs as $job) {
            WorkingJob::create($job);
        }
    }
}
