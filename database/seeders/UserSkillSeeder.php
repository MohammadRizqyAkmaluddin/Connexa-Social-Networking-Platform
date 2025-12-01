<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $skillList = [

            'PHP', 'JavaScript', 'Python', 'Java', 'C++', 'Go', 'C#',
            'Laravel', 'React', 'Vue.js', 'Next.js',
            'Node.js', 'Express.js', 'Flutter', 'React Native',
            'HTML', 'CSS', 'Bootstrap', 'Tailwind CSS',
            'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite',
            'Docker', 'Kubernetes', 'Git', 'GitHub', 'CI/CD',
            'Cloud Computing', 'AWS', 'Google Cloud', 'Azure',
            'Linux Administration', 'Cybersecurity Awareness',
            'UI/UX Design', 'Figma', 'Adobe XD', 'Wireframing',

            'Business Strategy', 'Business Analysis',
            'Operations Management', 'Risk Management',
            'Supply Chain Management', 'Process Improvement',
            'Management Consulting', 'Organizational Development',

            'Financial Reporting', 'Financial Analysis',
            'Bookkeeping', 'Tax Preparation', 'Budgeting',
            'Cost Control', 'Auditing', 'Investment Analysis',
            'Payroll Management', 'Cash Flow Management',

            'Digital Marketing', 'Content Marketing',
            'Search Engine Optimization (SEO)',
            'Search Engine Marketing (SEM)', 'Brand Management',
            'Market Research', 'Product Marketing',
            'Copywriting', 'Social Media Management',
            'Google Ads', 'Facebook Ads Manager',

            'Negotiation', 'Customer Relationship Management (CRM)',
            'Prospecting', 'Cold Calling', 'Sales Strategy',
            'Account Management', 'Lead Qualification',
            'Retail Operations', 'Merchandising',

            'Recruitment', 'Talent Acquisition',
            'Interviewing', 'Performance Management',
            'Training & Development', 'Employee Engagement',
            'HR Administration', 'Compensation & Benefits',
            'HRIS Management',

            'Graphic Design', 'Video Editing', 'Photography',
            'Adobe Photoshop', 'Adobe Illustrator',
            'Adobe Premiere Pro', 'After Effects',
            'Storytelling', 'Creative Writing', 'Scriptwriting',

            'Mechanical Engineering', 'Electrical Engineering',
            'AutoCAD', 'SolidWorks', 'Quality Control',
            'Product Design', 'Maintenance Planning',
            'Manufacturing Processes', 'Assembly Line Operations',

            'Patient Care', 'Clinical Documentation',
            'Medical Terminology', 'First Aid', 'Phlebotomy',
            'Medication Administration', 'Health Education',

            'Customer Service', 'Hotel Management',
            'Front Office Operations', 'Housekeeping Management',
            'Event Planning', 'Food & Beverage Service',
            'Tour Guiding',

            'Teaching', 'Curriculum Development',
            'Classroom Management', 'Lesson Planning',
            'Educational Counseling', 'Training Delivery',

            'Inventory Management', 'Warehouse Operations',
            'Procurement', 'Supply Planning', 'Shipping Coordination',
            'Fleet Management', 'Scheduling & Planning',

            'Administrative Support', 'Data Entry',
            'Document Management', 'Email Management',
            'Microsoft Excel', 'Microsoft Word', 'PowerPoint',
            'Office Management', 'Report Writing',

            'Leadership', 'Teamwork', 'Communication',
            'Critical Thinking', 'Problem Solving',
            'Time Management', 'Adaptability',
            'Creativity', 'Attention to Detail',
            'Analytical Thinking', 'Decision Making',
            'Public Speaking', 'Collaboration',

        ];


        $users = DB::table('users')->pluck('user_id');

        foreach ($users as $userId)
        {
            $educationIds = DB::table('user_educations')
                ->where('user_id', $userId)
                ->pluck('education_id')
                ->toArray();

            $experienceIds = DB::table('user_experiences')
                ->where('user_id', $userId)
                ->pluck('experience_id')
                ->toArray();

            if (empty($educationIds) && empty($experienceIds))
            {
                continue;
            }

            $skillCount = rand(3, 15);

            for ($i = 0; $i < $skillCount; $i++)
            {
                $linkTo = null;
                if (!empty($educationIds) && !empty($experienceIds)) {
                    $linkTo = $faker->randomElement(['education', 'experience']);
                } elseif (!empty($educationIds)) {
                    $linkTo = 'education';
                } else {
                    $linkTo = 'experience';
                }

                $educationId  = null;
                $experienceId = null;

                if ($linkTo === 'education') {
                    $educationId = $faker->randomElement($educationIds);
                } else {
                    $experienceId = $faker->randomElement($experienceIds);
                }

                DB::table('user_skills')->insert([
                    'user_id'       => $userId,
                    'education_id'  => $educationId,
                    'experience_id' => $experienceId,
                    'skill'         => $faker->randomElement($skillList)
                ]);
            }
        }

    }
}
