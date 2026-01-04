<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{

    // public function run()
    // {
    //     DB::table('employment')->insert([
    //         [
    //             'employment_id'   => 'FT',
    //             'employment_type' => 'Full-time',
    //         ],
    //         [
    //             'employment_id'   => 'PT',
    //             'employment_type' => 'Part-time',
    //         ],
    //         [
    //             'employment_id'   => 'CO',
    //             'employment_type' => 'Contract',
    //         ],
    //         [
    //             'employment_id'   => 'IN',
    //             'employment_type' => 'Internship',
    //         ],
    //     ]);
    // }

    public function run()
    {
        $employments = [
            ['employment_id' => 'FT', 'employment_type' => 'Full-time'],
            ['employment_id' => 'PT', 'employment_type' => 'Part-time'],
            ['employment_id' => 'CO', 'employment_type' => 'Contract'],
            ['employment_id' => 'IN', 'employment_type' => 'Internship'],
        ];

        foreach ($employments as $employment) {
            DB::table('employment')->updateOrInsert(
                ['employment_id' => $employment['employment_id']],
                ['employment_type' => $employment['employment_type']]
            );
        }
    }

}
