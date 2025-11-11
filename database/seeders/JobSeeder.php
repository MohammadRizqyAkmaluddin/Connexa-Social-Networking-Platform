<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobSeeder =
        [
            ['company_id' => 'C001', 'title' => 'Software Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C001', 'title' => 'Data Analyst Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'Machine Learning Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'Product Manager', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C003', 'title' => 'Frontend Developer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C004', 'title' => 'Social Media Specialist', 'employment_id' => 'PT', 'mode_id' => 'RE'],
            ['company_id' => 'C005', 'title' => 'iOS Developer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C005', 'title' => 'Hardware Design Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C006', 'title' => 'Business Intelligence Analyst', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C007', 'title' => 'UI/UX Designer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C008', 'title' => 'Backend Developer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C008', 'title' => 'DevOps Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C009', 'title' => 'Research Assistant', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C009', 'title' => 'Full Stack Developer Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C010', 'title' => 'English Teacher', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C011', 'title' => 'Academic Researcher', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C011', 'title' => 'Teaching Assistant', 'employment_id' => 'PT', 'mode_id' => 'OS'],
            ['company_id' => 'C012', 'title' => 'Game Designer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C012', 'title' => '3D Artist Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C013', 'title' => 'Financial Analyst', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C013', 'title' => 'Customer Service Officer', 'employment_id' => 'CO', 'mode_id' => 'OS'],
            ['company_id' => 'C001', 'title' => 'Junior Backend Developer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C001', 'title' => 'Senior Database Administrator', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C002', 'title' => 'Data Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'MLOps Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C003', 'title' => 'Senior Frontend Developer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C003', 'title' => 'QA Automation Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C004', 'title' => 'Mobile Android Developer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C005', 'title' => 'Systems Architect', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C005', 'title' => 'Embedded Software Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C006', 'title' => 'Senior Backend Developer (Node.js)', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C006', 'title' => 'Platform Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C007', 'title' => 'Junior Frontend Developer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C007', 'title' => 'API Integration Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C008', 'title' => 'Site Reliability Engineer (SRE)', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C008', 'title' => 'Security Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C009', 'title' => 'Teaching Fellow - Web Development', 'employment_id' => 'PT', 'mode_id' => 'OS'],
            ['company_id' => 'C009', 'title' => 'Academic Software Developer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C010', 'title' => 'IT Support Technician', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C011', 'title' => 'Research Software Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C011', 'title' => 'Cloud Solutions Architect', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C012', 'title' => 'Gameplay Programmer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C012', 'title' => 'Network Programmer Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C013', 'title' => 'Senior Software Engineer - Finance', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C013', 'title' => 'Data Privacy Officer (Contract)', 'employment_id' => 'CO', 'mode_id' => 'OS'],
            ['company_id' => 'C001', 'title' => 'API Backend Engineer (Golang)', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'Full Stack Developer (React + Node)', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C006', 'title' => 'Cloud Native Developer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C007', 'title' => 'Performance Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C008', 'title' => 'DevSecOps Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C005', 'title' => 'Senior Machine Learning Researcher', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C003', 'title' => 'Accessibility Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C012', 'title' => 'Tools Engineer (Game Dev Tools)', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C009', 'title' => 'Full Stack Instructor (Part-time)', 'employment_id' => 'PT', 'mode_id' => 'OS'],
            ['company_id' => 'C011', 'title' => 'High Performance Computing Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C013', 'title' => 'Payments Integration Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C006', 'title' => 'Junior QA Tester', 'employment_id' => 'IN', 'mode_id' => 'HY'],
        ];

        DB::table('jobs')->insert($jobSeeder);
    }
}

