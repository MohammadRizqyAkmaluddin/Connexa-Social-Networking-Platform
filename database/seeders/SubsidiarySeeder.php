<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsidiarySeeder extends Seeder
{
    public function run()
    {
        // DB::table('subsidiary')->insert([
        //     [
        //         'company_id' => 'C003',
        //         'parent_id'    => 'C002',
        //     ],
        //     [
        //         'company_id' => 'C004',
        //         'parent_id'    => 'C002',
        //     ],
        //     [
        //         'company_id' => 'C007',
        //         'parent_id'    => 'C006',
        //     ],
        //     [
        //         'company_id' => 'C008',
        //         'parent_id'    => 'C006',
        //     ],
        //     [
        //         'company_id' => 'C010',
        //         'parent_id'    => 'C009',
        //     ],
        // ]);

        $subsidiaries = [
            ['company_id' => 'C003', 'parent_id' => 'C002'],
            ['company_id' => 'C004', 'parent_id' => 'C002'],
            ['company_id' => 'C007', 'parent_id' => 'C006'],
            ['company_id' => 'C008', 'parent_id' => 'C006'],
            ['company_id' => 'C010', 'parent_id' => 'C009'],
        ];

        foreach ($subsidiaries as $sub) {
            DB::table('subsidiary')->updateOrInsert(
                ['company_id' => $sub['company_id']], // cek primary key
                ['parent_id' => $sub['parent_id']]    // data update / insert
            );
        }

    }
}
