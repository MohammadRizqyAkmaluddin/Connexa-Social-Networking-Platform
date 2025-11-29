<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $resumeFiles = [
            'Resume_File_First.pdf',
            'Resume_File_Second.pdf'
        ];

        for ($i = 1; $i <= 100; $i++) {

            foreach ($resumeFiles as $file) {
                DB::table('user_resumes')->insert([
                    'user_id' => 'U' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'resume'  => $file,
                ]);
            }
        }
    }
}
