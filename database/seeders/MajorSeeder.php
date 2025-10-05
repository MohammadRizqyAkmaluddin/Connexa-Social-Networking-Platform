<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{

    public function run()
    {
          DB::table('majors')->insert([
            ['company_id' => 'C009', 'major' => 'Bachelor of Computer Science'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Cyber Security'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Data Science'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Software Engineering'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Information Systems'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Business Analytics'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Visual Communication Design'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Interior Design'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Accounting'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Finance'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Business Management'],
            ['company_id' => 'C009', 'major' => 'Bachelor of International Relations'],
            ['company_id' => 'C009', 'major' => 'Bachelor of Psychology'],
            ['company_id' => 'C009', 'major' => 'Master of Management'],
            ['company_id' => 'C009', 'major' => 'Master of Information System Management'],
            ['company_id' => 'C009', 'major' => 'Master of Computer Science'],
            ['company_id' => 'C009', 'major' => 'Master of Accounting'],
            ['company_id' => 'C009', 'major' => 'Master of Communication'],
            ['company_id' => 'C009', 'major' => 'Master of Marine Digital Technology'],
            ['company_id' => 'C009', 'major' => 'Master of Digital Business Fisheries'],
            ['company_id' => 'C009', 'major' => 'Doctor of Computer Science'],
            ['company_id' => 'C009', 'major' => 'Doctor of Research in Management'],
            ['company_id' => 'C010', 'major' => 'IB Primary Years Programme (PYP)'],
            ['company_id' => 'C010', 'major' => 'IB Middle Years Programme (MYP)'],
            ['company_id' => 'C010', 'major' => 'IB Diploma Programme (DP)'],
            ['company_id' => 'C011', 'major' => 'Bachelor of Arts'],
            ['company_id' => 'C011', 'major' => 'Bachelor of Science'],
            ['company_id' => 'C011', 'major' => 'Master of Arts'],
            ['company_id' => 'C011', 'major' => 'Bachelor of Science'],
            ['company_id' => 'C011', 'major' => 'Master of Arts'],
            ['company_id' => 'C011', 'major' => 'Master of Science'],
            ['company_id' => 'C011', 'major' => 'Master of Engineering'],
            ['company_id' => 'C011', 'major' => 'Master of Business Administration (MBA)'],
            ['company_id' => 'C011', 'major' => 'Master of Divinity'],
            ['company_id' => 'C011', 'major' => 'Master of Education'],
            ['company_id' => 'C011', 'major' => 'Master of Laws'],
            ['company_id' => 'C011', 'major' => 'Master of Medical Science'],
            ['company_id' => 'C011', 'major' => 'Doctor of Philosophy'],
            ['company_id' => 'C011', 'major' => 'Doctor of Medicine'],
            ['company_id' => 'C011', 'major' => 'Doctor of Law'],
            ['company_id' => 'C011', 'major' => 'Doctor of Theology'],
            ['company_id' => 'C011', 'major' => 'Doctor of Juridical Science'],
            ['company_id' => 'C011', 'major' => 'Doctor of Education Leadership'],    
        ]);
    }
}
