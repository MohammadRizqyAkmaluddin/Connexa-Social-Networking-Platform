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
        ]);
        $this->call([
            EmploymentSeeder::class,
        ]);
        $this->call([
            ModeSeeder::class,
        ]);
        $this->call([
            ProficiencySeeder::class,
        ]);
        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            companySeeder::class,
        ]);
        $this->call([
            SubsidiarySeeder::class,
        ]);
        $this->call([
            MajorSeeder::class,
        ]);
        $this->call([
            CompanyRoleSeeder::class,
        ]);
        $this->call([
            AccessSeeder::class,
        ]);
        $this->call([
            UserEducationSeeder::class,
        ]);
        $this->call([
            PostSeeder::class,
        ]);
        $this->call([
            CommentSeeder::class,
        ]);
        $this->call([
            LikeSeeder::class,
        ]);
        $this->call([
            ConnectionSeeder::class,
        ]);
        $this->call([
            FollowSeeder::class,
        ]);
        $this->call([
            PostImageSeeder::class,
        ]);
        $this->call([
            AdsSeeder::class,
        ]);
        $this->call([
            MessageSeeder::class,
        ]);
        $this->call([
            OverviewSeeder::class,
        ]);
        $this->call([
            JobSeeder::class,
        ]);
        $this->call([
            JobSalarySeeder::class,
        ]);
        $this->call([
            UserExperienceSeeder::class,
        ]);
    }
}
