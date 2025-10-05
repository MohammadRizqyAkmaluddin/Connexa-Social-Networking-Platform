<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyRoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('company_roles')->insert([
            [
                'user_id'       => 'U061',
                'company_id'    => 'C001',
                'role'          => 'Founder',
            ],
            [
                'user_id'       => 'U102',
                'company_id'    => 'C001',
                'role'          => 'CEO',
            ],
            [
                'user_id'       => 'U004',
                'company_id'    => 'C001',
                'role'          => 'CTO',
            ],
            [
                'user_id'       => 'U063',
                'company_id'    => 'C004',
                'role'          => 'Founder & CEO',
            ],
            [
                'user_id'       => 'U062',
                'company_id'    => 'C005',
                'role'          => 'Founder',
            ],
            [
                'user_id'       => 'U070',
                'company_id'    => 'C005',
                'role'          => 'CEO',
            ],
            [
                'user_id'       => 'U102',
                'company_id'    => 'C006',
                'role'          => 'Founder & CEO',
            ],
            [
                'user_id'       => 'U068',
                'company_id'    => 'C007',
                'role'          => 'Founder',
            ],
            [
                'user_id'       => 'U004',
                'company_id'    => 'C007',
                'role'          => 'CEO',
            ],
            [
                'user_id'       => 'U101',
                'company_id'    => 'C008',
                'role'          => 'Founder',
            ],
            [
                'user_id'       => 'U092',
                'company_id'    => 'C008',
                'role'          => 'CEO',
            ],
        ]);
    }
}