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
    }
}
