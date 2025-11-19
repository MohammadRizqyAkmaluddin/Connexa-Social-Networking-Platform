<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_category')->insert([
            [
                'job_cat_id' => 'IT',
                'category'   => 'IT'
            ],
            [
                'job_cat_id' => 'CR',
                'category'   => 'Creative'
            ],
            [
                'job_cat_id' => 'MA',
                'category'   => 'Manufacturing'
            ],
            [
                'job_cat_id' => 'HO',
                'category'   => 'Hospitality'
            ],
            [
                'job_cat_id' => 'FI',
                'category'   => 'Finance'
            ],
            [
                'job_cat_id' => 'HS',
                'category'   => 'Human Services'
            ],
            [
                'job_cat_id' => 'LG',
                'category'   => 'Logistics'
            ],
            [
                'job_cat_id' => 'MK',
                'category'   => 'Marketing'
            ],
            [
                'job_cat_id' => 'EN',
                'category'   => 'Engineering'
            ],
            [
                'job_cat_id' => 'FA',
                'category'   => 'Fashion'
            ],
            [
                'job_cat_id' => 'ED',
                'category'   => 'Education'
            ],
            [
                'job_cat_id' => 'RE',
                'category'   => 'Retail'
            ],
            [
                'job_cat_id' => 'FB',
                'category'   => 'F&B'
            ],
            [
                'job_cat_id' => 'AR',
                'category'   => 'Architecture'
            ]
        ]);
    }
}
