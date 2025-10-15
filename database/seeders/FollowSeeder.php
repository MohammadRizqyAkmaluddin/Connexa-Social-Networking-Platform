<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('follows')->insert ([
            [
                'user_id'       => 'U001',
                'company_id'   => 'C001',
            ],
            [
                'user_id'       => 'U001',
                'company_id'   => 'C009',
            ],
            [
                'user_id'       => 'U001',
                'company_id'   => 'C005',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C001',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C002',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C003',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C004',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C005',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C006',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C007',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C008',
            ],
            [
                'user_id'       => 'U002',
                'company_id'   => 'C009',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C001',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C002',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C003',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C004',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C005',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C006',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C007',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C008',
            ],
            [
                'user_id'       => 'U003',
                'company_id'   => 'C009',
            ],
        ]);
    }
}
