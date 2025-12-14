<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('industries')->insert([
            
            // Finance & Economy
            ['industry' => 'Banking'],
            ['industry' => 'Investment Banking'],
            ['industry' => 'Financial Services'],
            ['industry' => 'Insurance'],
            ['industry' => 'Accounting'],
            ['industry' => 'Venture Capital and Private Equity'],
            ['industry' => 'Capital Markets'],
            ['industry' => 'Economic Research'],

            // Information Technology
            ['industry' => 'Information Technology and Services'],
            ['industry' => 'Software Development'],
            ['industry' => 'Computer Networking'],
            ['industry' => 'Cybersecurity'],
            ['industry' => 'Cloud Computing'],
            ['industry' => 'Artificial Intelligence'],
            ['industry' => 'Data Analytics'],
            ['industry' => 'IT Consulting'],
            ['industry' => 'Game Development'],

            // Business & Consulting
            ['industry' => 'Business Consulting and Services'],
            ['industry' => 'Management Consulting'],
            ['industry' => 'Outsourcing and Offshoring'],
            ['industry' => 'Market Research'],
            ['industry' => 'Human Resources Services'],

            // Manufacturing & Engineering
            ['industry' => 'Manufacturing'],
            ['industry' => 'Industrial Automation'],
            ['industry' => 'Automotive Manufacturing'],
            ['industry' => 'Electronics Manufacturing'],
            ['industry' => 'Food and Beverage Manufacturing'],
            ['industry' => 'Textile Manufacturing'],
            ['industry' => 'Chemical Manufacturing'],
            ['industry' => 'Mechanical Engineering'],
            ['industry' => 'Electrical Engineering'],

            // Construction & Property
            ['industry' => 'Construction'],
            ['industry' => 'Real Estate'],
            ['industry' => 'Property Management'],
            ['industry' => 'Architecture and Planning'],
            ['industry' => 'Wholesale Building Materials'],

            // Health & Medical
            ['industry' => 'Hospital and Health Care'],
            ['industry' => 'Medical Practice'],
            ['industry' => 'Pharmaceutical Manufacturing'],
            ['industry' => 'Biotechnology Research'],
            ['industry' => 'Mental Health Care'],
            ['industry' => 'Medical Devices'],

            // Education & Research
            ['industry' => 'Education Management'],
            ['industry' => 'Higher Education'],
            ['industry' => 'Primary and Secondary Education'],
            ['industry' => 'E-Learning'],
            ['industry' => 'Research Services'],

            // Media, Creative & Communication
            ['industry' => 'Marketing and Advertising'],
            ['industry' => 'Public Relations and Communications'],
            ['industry' => 'Graphic Design'],
            ['industry' => 'Motion Pictures and Film'],
            ['industry' => 'Broadcast Media Production and Distribution'],
            ['industry' => 'Book and Periodical Publishing'],
            ['industry' => 'Online Media'],
            ['industry' => 'Photography'],

            // Retail, Food & Lifestyle
            ['industry' => 'Retail'],
            ['industry' => 'E-Commerce'],
            ['industry' => 'Food and Beverage Services'],
            ['industry' => 'Hospitality'],
            ['industry' => 'Restaurants'],
            ['industry' => 'Consumer Goods'],
            ['industry' => 'Fashion and Apparel'],

            // Logistics & Transportation
            ['industry' => 'Logistics and Supply Chain'],
            ['industry' => 'Transportation'],
            ['industry' => 'Warehousing'],
            ['industry' => 'Maritime'],
            ['industry' => 'Aviation'],

            // Energy & Environment
            ['industry' => 'Oil and Gas'],
            ['industry' => 'Renewable Energy'],
            ['industry' => 'Utilities'],
            ['industry' => 'Environmental Services'],
            ['industry' => 'Waste Management'],

            // Government & Social
            ['industry' => 'Government Administration'],
            ['industry' => 'Public Policy'],
            ['industry' => 'Non-Profit Organization Management'],
            ['industry' => 'International Affairs'],
            ['industry' => 'Public Safety'],

            // Others
            ['industry' => 'Legal Services'],
            ['industry' => 'Law Practice'],
            ['industry' => 'Security and Investigations'],
            ['industry' => 'Sports'],
            ['industry' => 'Entertainment'],
            ['industry' => 'Travel and Tourism'],
        ]);

    }
}
