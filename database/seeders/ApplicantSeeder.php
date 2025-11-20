<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $resumeFile = 'Resume_Mohammad_Rizqy_Akmaluddin.pdf';
        $status = ['On Progress', 'Rejected'];

        for ($i = 0; $i < 200; $i++) {

            DB::table('applicants')->insert([
                'user_id' => 'U' . str_pad($faker->numberBetween(1, 95), 3, '0', STR_PAD_LEFT),
                'job_id' => $faker->numberBetween(1, 117),
                'resume_file' => $resumeFile,
                'status' => $faker->randomElement($status),
            ]);
        }
    }
}
