<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProficiencySeeder extends Seeder
{
    
    public function run()
    {
        DB::table('proficiencies')->insert([
            [
                'proficiency_id' => 'EP',
                'proficiency'    => 'Elementary proficiency',
            ],
            [
                'proficiency_id' => 'LW',
                'proficiency'    => 'Limited working proficiency',
            ],
            [
                'proficiency_id' => 'PW',
                'proficiency'    => 'Professional working proficiency',
            ],
            [
                'proficiency_id' => 'FP',
                'proficiency'    => 'Full professional proficiency',
            ],
            [
                'proficiency_id' => 'NA',
                'proficiency'    => 'Native or bilingual proficiency',
            ],
        ]);
    }
}
