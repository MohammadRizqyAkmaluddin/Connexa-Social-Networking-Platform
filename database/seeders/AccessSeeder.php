<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessSeeder extends Seeder
{
    public function run()
    {
        DB::table('access_management')->insert([
            ['company_id' => 'C001', 'user_id' => 'U061'],
            ['company_id' => 'C001', 'user_id' => 'U004'],
            ['company_id' => 'C002', 'user_id' => 'U063'],
            ['company_id' => 'C002', 'user_id' => 'U004'],
            ['company_id' => 'C003', 'user_id' => 'U063'],
            ['company_id' => 'C003', 'user_id' => 'U004'],
            ['company_id' => 'C004', 'user_id' => 'U063'],
            ['company_id' => 'C004', 'user_id' => 'U004'],
            ['company_id' => 'C005', 'user_id' => 'U062'],
            ['company_id' => 'C005', 'user_id' => 'U004'],
            ['company_id' => 'C006', 'user_id' => 'U102'],
            ['company_id' => 'C006', 'user_id' => 'U004'],
            ['company_id' => 'C007', 'user_id' => 'U101'],
            ['company_id' => 'C007', 'user_id' => 'U004'],
            ['company_id' => 'C008', 'user_id' => 'U102'],
            ['company_id' => 'C008', 'user_id' => 'U004'],
            ['company_id' => 'C009', 'user_id' => 'U003'],
            ['company_id' => 'C010', 'user_id' => 'U004'],
            ['company_id' => 'C011', 'user_id' => 'U006'],
            ['company_id' => 'C012', 'user_id' => 'U004'],
            ['company_id' => 'C012', 'user_id' => 'U017'],
            ['company_id' => 'C013', 'user_id' => 'U004'],
        ]);
    }
}
