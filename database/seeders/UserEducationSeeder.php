<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserEducationSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_educations')->insert([
            [
                'user_id'       => 'U001',
                'company_id'    => 'C009',
                'major_id'      => 1,
                'start_date'    => '2023-08-01',
                'end_date'      => '2027-08-01',
                'GPA'           => 3.75,
                'description'   => 'As a Computer Science student at BINUS University, I am delving deeply into software engineering, with a focus on full-stack web development',
                'section_id'    => 'SEC03',
            ],
        ]);
    }
}



