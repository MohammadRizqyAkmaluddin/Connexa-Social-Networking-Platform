<?php

namespace Database\Seeders;

use App\Models\UserExperience;
use Illuminate\Database\Seeder;
use Subsidiary;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            PageSeeder::class,
            EmploymentSeeder::class,
            ProficiencySeeder::class,
            ModeSeeder::class,
            UserSeeder::class,
            companySeeder::class,
            SubsidiarySeeder::class,
            MajorSeeder::class,
            CompanyRoleSeeder::class,
            AccessSeeder::class,
            UserEducationSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            LikeSeeder::class,
            ConnectionSeeder::class,
            FollowSeeder::class,
            PostImageSeeder::class,
            AdsSeeder::class,
            MessageSeeder::class,
            OverviewSeeder::class,
            JobSeeder::class,
            JobSalarySeeder::class,
            UserExperienceSeeder::class,
            ApplicantSeeder::class
        ]);
    }
}
