<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run(): void
    {

        $job_detail = '<p><strong>Job Description</strong></p><ul><li>Install and setup laptop with Windows operating system</li><li>Configure computer hardware, software, and IT office devices (printers, CCTV, etc.)</li><li>Replacing laptop and computer hardware (HDD/SSD, RAM, Keyboard, etc.)</li><li>Diagnosing and troubleshooting issues on laptops and computers</li><li>Updating database of laptop devices<br>&nbsp;</li></ul><p><strong>Qualifications</strong></p><ul><li>Able to install and replace laptop and computer hardware (HDD/SSD, RAM, keyboards, etc.)</li><li>Familiar with installing Windows operating system</li><li>Able to operate Ms. Office for data collection</li><li>Honest and have a good communication skill</li></ul>';

        $jobSeeder =
        [
            ['company_id' => 'C001', 'title' => 'Software Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C001', 'title' => 'Data Analyst Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'Machine Learning Engineer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C002', 'title' => 'Product Manager', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C003', 'title' => 'Frontend Developer', 'employment_id' => 'FT', 'mode_id' => 'RE'],
            ['company_id' => 'C004', 'title' => 'Social Media Specialist', 'employment_id' => 'PT', 'mode_id' => 'RE'],
            ['company_id' => 'C005', 'title' => 'IOS Developer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
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
            ['company_id' => 'C014', 'title' => 'Petroleum Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],
            ['company_id' => 'C014', 'title' => 'Pipeline Integrity Specialist', 'employment_id' => 'FT', 'mode_id' => 'HY'],
            ['company_id' => 'C014', 'title' => 'Energy Data Analyst', 'employment_id' => 'CO', 'mode_id' => 'RE'],            // 60
            ['company_id' => 'C014', 'title' => 'Health & Safety Supervisor', 'employment_id' => 'FT', 'mode_id' => 'OS'],     // 61
            ['company_id' => 'C015', 'title' => 'Electrical Systems Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],   // 62
            ['company_id' => 'C015', 'title' => 'Distribution Network Planner', 'employment_id' => 'CO', 'mode_id' => 'HY'], // 63
            ['company_id' => 'C015', 'title' => 'Smart Grid Analyst', 'employment_id' => 'FT', 'mode_id' => 'RE'],           // 64
            ['company_id' => 'C015', 'title' => 'Substation Technician', 'employment_id' => 'FT', 'mode_id' => 'OS'],        // 65
            ['company_id' => 'C016', 'title' => 'Network Optimization Engineer', 'employment_id' => 'FT', 'mode_id' => 'HY'], // 66
            ['company_id' => 'C016', 'title' => 'Cybersecurity Analyst', 'employment_id' => 'FT', 'mode_id' => 'RE'],        // 67
            ['company_id' => 'C016', 'title' => 'Digital Product Manager', 'employment_id' => 'FT', 'mode_id' => 'HY'],      // 68
            ['company_id' => 'C016', 'title' => 'Telecommunications Technician', 'employment_id' => 'CO', 'mode_id' => 'OS'], // 69
            ['company_id' => 'C017', 'title' => 'Credit Risk Analyst', 'employment_id' => 'FT', 'mode_id' => 'HY'],     // 70
            ['company_id' => 'C017', 'title' => 'Corporate Banking Officer', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 71
            ['company_id' => 'C017', 'title' => 'Fraud Detection Specialist', 'employment_id' => 'CO', 'mode_id' => 'RE'], // 72
            ['company_id' => 'C017', 'title' => 'Financial Reporting Associate', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 73
            ['company_id' => 'C018', 'title' => 'Microfinance Relationship Manager', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 74
            ['company_id' => 'C018', 'title' => 'Banking Operations Associate', 'employment_id' => 'PT', 'mode_id' => 'HY'],      // 75
            ['company_id' => 'C018', 'title' => 'Financial Data Analyst', 'employment_id' => 'FT', 'mode_id' => 'RE'],           // 76
            ['company_id' => 'C018', 'title' => 'Customer Solutions Officer', 'employment_id' => 'CO', 'mode_id' => 'OS'],       // 77
            ['company_id' => 'C019', 'title' => 'Loan Verification Specialist', 'employment_id' => 'FT', 'mode_id' => 'OS'],  // 78
            ['company_id' => 'C019', 'title' => 'Internal Audit Officer', 'employment_id' => 'FT', 'mode_id' => 'HY'],       // 79
            ['company_id' => 'C019', 'title' => 'Wealth Management Associate', 'employment_id' => 'CO', 'mode_id' => 'RE'],   // 80
            ['company_id' => 'C019', 'title' => 'Business Intelligence Analyst', 'employment_id' => 'FT', 'mode_id' => 'HY'], // 81
            ['company_id' => 'C020', 'title' => 'Railway Operations Supervisor', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 82
            ['company_id' => 'C020', 'title' => 'Transportation Scheduler', 'employment_id' => 'CO', 'mode_id' => 'HY'],      // 83
            ['company_id' => 'C020', 'title' => 'Mechanical Rolling Stock Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 84
            ['company_id' => 'C020', 'title' => 'Passenger Service Coordinator', 'employment_id' => 'PT', 'mode_id' => 'OS'], // 85
            ['company_id' => 'C021', 'title' => 'Flight Operations Analyst', 'employment_id' => 'FT', 'mode_id' => 'HY'],   // 86
            ['company_id' => 'C021', 'title' => 'Cabin Crew Officer', 'employment_id' => 'FT', 'mode_id' => 'OS'],         // 87
            ['company_id' => 'C021', 'title' => 'Aviation Safety Specialist', 'employment_id' => 'CO', 'mode_id' => 'RE'], // 88
            ['company_id' => 'C021', 'title' => 'Airline Marketing Strategist', 'employment_id' => 'FT', 'mode_id' => 'HY'], // 89
            ['company_id' => 'C022', 'title' => 'Civil Project Engineer', 'employment_id' => 'FT', 'mode_id' => 'OS'],  // 90
            ['company_id' => 'C022', 'title' => 'Construction Quality Inspector', 'employment_id' => 'CO', 'mode_id' => 'HY'], // 91
            ['company_id' => 'C022', 'title' => 'Site Safety Coordinator', 'employment_id' => 'FT', 'mode_id' => 'OS'], // 92
            ['company_id' => 'C022', 'title' => 'Infrastructure Planning Analyst', 'employment_id' => 'PT', 'mode_id' => 'RE'], // 93
            ['company_id' => 'C023', 'title' => 'Port Operations Officer', 'employment_id' => 'FT', 'mode_id' => 'OS'],  // 94
            ['company_id' => 'C023', 'title' => 'Logistics Planning Analyst', 'employment_id' => 'FT', 'mode_id' => 'HY'], // 95
            ['company_id' => 'C023', 'title' => 'Maritime Compliance Specialist', 'employment_id' => 'CO', 'mode_id' => 'RE'], // 96
            ['company_id' => 'C023', 'title' => 'Warehouse Documentation Staff', 'employment_id' => 'PT', 'mode_id' => 'OS'], // 97
            ['company_id' => 'C024', 'title' => 'Automotive Engineering Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C024', 'title' => 'Business Analyst Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C025', 'title' => 'Finance Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C025', 'title' => 'Marketing Strategy Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C026', 'title' => 'Manufacturing Operations Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C026', 'title' => 'Quality Assurance Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C027', 'title' => 'Product Development Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C027', 'title' => 'Supply Chain Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C028', 'title' => 'Research & Development Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C028', 'title' => 'Pharmaceutical QA Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C029', 'title' => 'Supply Chain Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C029', 'title' => 'Logistics Analyst Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C030', 'title' => 'Mechanical Engineering Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C030', 'title' => 'Industrial Design Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C031', 'title' => 'Aerospace Engineering Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C031', 'title' => 'CAD Modeling Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
            ['company_id' => 'C032', 'title' => 'Naval Architecture Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C032', 'title' => 'Marine Engineering Intern', 'employment_id' => 'IN', 'mode_id' => 'RE'],
            ['company_id' => 'C033', 'title' => 'Electronics Systems Intern', 'employment_id' => 'IN', 'mode_id' => 'OS'],
            ['company_id' => 'C033', 'title' => 'Software & Embedded Intern', 'employment_id' => 'IN', 'mode_id' => 'HY'],
        ];


        foreach ($jobSeeder as &$job) {
            $job['job_details'] = $job_detail;
        }

        DB::table('jobs')->insert($jobSeeder);
    }
}

