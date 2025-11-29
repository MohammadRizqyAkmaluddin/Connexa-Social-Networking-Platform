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

        $resumeFile  = ['Resume_File_First.pdf', 'Resume_File_Second.pdf'];
        $coverLetter = '<p>Dear Hiring Manager,</p><p>I am writing to express interest in exploring any available opportunities within your organization. This letter is intended to introduce an applicant who is eager to contribute, learn, and grow in a professional environment.</p><p>The applicant has experience working on various projects involving system development, teamwork, and problem-solving. Familiarity with general technical workflows and common development practices has helped build a solid foundation for adapting to different tasks and responsibilities.</p><p>With a strong willingness to learn and the ability to collaborate effectively, the applicant is prepared to support ongoing activities and contribute to organizational objectives as needed.</p><p>Thank you for taking the time to review this letter. Additional information or clarification can be provided upon request.</p><p>Best regards</p>';
        $portfolio   = 'Portfolio_File.pdf';
        $statusList  = ['On Progress', 'Rejected', 'Pass'];
        $progressList    = ['Review', 'Test', 'Interview'];

        $users = [];
        for ($i = 1; $i <= 95; $i++) {
            $users[] = 'U' . str_pad($i, 3, '0', STR_PAD_LEFT);
        }

        $jobs = range(1, 117);

        $combinations = [];
        foreach ($users as $user) {
            foreach ($jobs as $job) {
                $combinations[] = [
                    'user_id' => $user,
                    'job_id'  => $job
                ];
            }
        }

        shuffle($combinations);

        $totalInsert = 1000;

        for ($i = 0; $i < $totalInsert; $i++) {

            $pair = $combinations[$i];

            $status = $faker->randomElement($statusList);
            $created_at = $faker->dateTimeBetween('-1 month', 'now');


            if ($status == 'Pass') {
                $progress = 'Interview';
            } else {
                $progress = $faker->randomElement($progressList);
            }

            DB::table('applicants')->insert([
                'user_id'        => $pair['user_id'],
                'job_id'         => $pair['job_id'],
                'resume_file'    => $faker->randomElement($resumeFile),
                'portfolio_file' => $faker->boolean(60) ? $portfolio : null,
                'cover_letter'   => $faker->boolean(50) ? $coverLetter : null,
                'status'         => $status,
                'progress'       => $progress,
                'created_at'     => $created_at,
                'updated_at'     => $faker->dateTimeBetween($created_at, 'now')
            ]);
        }
    }

}


