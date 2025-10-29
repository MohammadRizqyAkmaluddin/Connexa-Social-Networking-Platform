<?php

namespace Database\Seeders;

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
            SectionSeeder::class,
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
    }
}
