<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSalarySeeder extends Seeder
{
    public function run(): void
    {
        $jobSallary =
        [
            ['job_id' => 1, 'min_salary' => 15000000, 'max_salary' => 25000000],
            ['job_id' => 2, 'min_salary' => 3000000, 'max_salary' => 5000000],
            ['job_id' => 3, 'min_salary' => 18000000, 'max_salary' => 30000000],
            ['job_id' => 5, 'min_salary' => 12000000, 'max_salary' => 20000000],
            ['job_id' => 7, 'min_salary' => 20000000, 'max_salary' => 35000000],
            ['job_id' => 10, 'min_salary' => 10000000, 'max_salary' => 18000000],
            ['job_id' => 11, 'min_salary' => 15000000, 'max_salary' => 25000000],
            ['job_id' => 12, 'min_salary' => 16000000, 'max_salary' => 26000000],
            ['job_id' => 15, 'min_salary' => 8000000, 'max_salary' => 12000000],
            ['job_id' => 18, 'min_salary' => 5000000, 'max_salary' => 8000000],
            ['job_id' => 19, 'min_salary' => 10000000, 'max_salary' => 18000000],
            ['job_id' => 22, 'min_salary' => 7000000,  'max_salary' => 12000000],
            ['job_id' => 23, 'min_salary' => 25000000, 'max_salary' => 40000000],
            ['job_id' => 24, 'min_salary' => 13000000, 'max_salary' => 22000000],
            ['job_id' => 25, 'min_salary' => 14000000, 'max_salary' => 26000000],
            ['job_id' => 26, 'min_salary' => 12000000, 'max_salary' => 20000000],
            ['job_id' => 27, 'min_salary' => 10000000, 'max_salary' => 18000000],
            ['job_id' => 28, 'min_salary' => 11000000, 'max_salary' => 19000000],
            ['job_id' => 29, 'min_salary' => 22000000, 'max_salary' => 36000000],
            ['job_id' => 30, 'min_salary' => 18000000, 'max_salary' => 32000000],
            ['job_id' => 31, 'min_salary' => 10000000, 'max_salary' => 17000000],
            ['job_id' => 32, 'min_salary' => 9000000,  'max_salary' => 15000000],
            ['job_id' => 36, 'min_salary' => 4000000,  'max_salary' => 7000000],
            ['job_id' => 37, 'min_salary' => 12000000, 'max_salary' => 20000000],
            ['job_id' => 38, 'min_salary' => 5000000,  'max_salary' => 9000000],
            ['job_id' => 39, 'min_salary' => 16000000, 'max_salary' => 30000000],
            ['job_id' => 40, 'min_salary' => 14000000, 'max_salary' => 26000000],
            ['job_id' => 41, 'min_salary' => 15000000, 'max_salary' => 28000000],
            ['job_id' => 42, 'min_salary' => 6000000,  'max_salary' => 9000000],
            ['job_id' => 43, 'min_salary' => 22000000, 'max_salary' => 38000000],
            ['job_id' => 46, 'min_salary' => 12000000, 'max_salary' => 22000000],
            ['job_id' => 47, 'min_salary' => 17000000, 'max_salary' => 30000000],
            ['job_id' => 48, 'min_salary' => 16000000, 'max_salary' => 28000000],
            ['job_id' => 50, 'min_salary' => 21000000, 'max_salary' => 36000000],
            ['job_id' => 51, 'min_salary' => 3500000,  'max_salary' => 6000000],
            ['job_id' => 58, 'min_salary' => 25000000, 'max_salary' => 38000000],
            ['job_id' => 60, 'min_salary' => 12000000, 'max_salary' => 18000000],
            ['job_id' => 62, 'min_salary' => 20000000, 'max_salary' => 33000000],
            ['job_id' => 66, 'min_salary' => 18000000, 'max_salary' => 30000000],
            ['job_id' => 68, 'min_salary' => 22000000, 'max_salary' => 34000000],
            ['job_id' => 70, 'min_salary' => 15000000, 'max_salary' => 24000000],
            ['job_id' => 72, 'min_salary' => 9000000,  'max_salary' => 15000000],
            ['job_id' => 73, 'min_salary' => 2000000, 'max_salary' => 2800000],
            ['job_id' => 74, 'min_salary' => 8000000,  'max_salary' => 13000000],
            ['job_id' => 77, 'min_salary' => 7000000,  'max_salary' => 10000000],
            ['job_id' => 79, 'min_salary' => 14000000, 'max_salary' => 23000000],
            ['job_id' => 82, 'min_salary' => 10000000, 'max_salary' => 16000000],
            ['job_id' => 86, 'min_salary' => 17000000, 'max_salary' => 28000000],
            ['job_id' => 90, 'min_salary' => 15000000, 'max_salary' => 26000000],
            ['job_id' => 92, 'min_salary' => 8000000,  'max_salary' => 12000000],
            ['job_id' => 95, 'min_salary' => 11000000, 'max_salary' => 19000000],
            ['job_id' => 63, 'min_salary' => 2500000, 'max_salary' => 3500000],
            ['job_id' => 67, 'min_salary' => 2300000, 'max_salary' => 3600000],
            ['job_id' => 75, 'min_salary' => 2500000, 'max_salary' => 3500000],
            ['job_id' => 78, 'min_salary' => 2200000, 'max_salary' => 3000000],
            ['job_id' => 80, 'min_salary' => 2300000, 'max_salary' => 3300000],


        ];

        DB::table('job_salary')->insert($jobSallary);
    }
}
