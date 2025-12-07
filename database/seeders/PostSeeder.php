<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'post_type'       => 'Educational',
                'user_id'       => NULL,
                'company_id'       => 'C001',
                'description'   => 'Writing clean code is not just about aesthetics — it’s about responsibility.
                                    Readable code helps teams move faster and prevents future headaches,
                                    always aim for clarity over cleverness.',
            ],
            [
                'post_type'       => 'Educational',
                'user_id'       => NULL,
                'company_id'       => 'C001',
                'description'   => 'Exploring how AI can improve software testing efficiency.
                                    Tools like Copilot and Testim are changing how we approach QA automation.
                                    The future of testing is definitely smarter.',
            ],
            [
                'post_type'       => 'Achievement',
                'user_id'       => 'U041',
                'company_id'       => NULL,
                'description'   => 'Thrilled to share that I’ve officially passed the AWS Certified Solutions Architect – Associate exam!
                                    The journey wasn’t easy, but it was worth every late-night study session.
                                    Excited to apply these cloud architecture skills in real-world projects.',
            ],
            [
                'post_type'       => 'Achievement',
                'user_id'       => NULL,
                'company_id'       => 'C007',
                'description'   => 'Proud to announce that our team successfully launched the new HR Management System for our client this week!
                                    Months of hard work, collaboration, and debugging finally paid off.
                                    Huge thanks to everyone who made this project a success! 🎉',
            ],
            [
                'post_type'       => 'Career',
                'user_id'       => 'U010',
                'company_id'       => NULL,
                'description'   => 'After three amazing years at TechCore Solutions, I’m excited to start a new chapter as a Backend Engineer at Tokopedia.
                                    I’m grateful for all the growth and mentorship I’ve experienced so far.
                                    Here’s to new challenges and continuous learning!',
            ],
            [
                'post_type'       => 'Career',
                'user_id'       => 'U016',
                'company_id'       => NULL,
                'description'   => 'Today marks my last day at DataForge Labs.
                                    It’s been a journey filled with great people, late-night coding, and valuable lessons.
                                    Excited (and a bit nervous) to see what comes next!',
            ],
            [
                'post_type'       => 'Daily',
                'user_id'       => 'U025',
                'company_id'       => NULL,
                'description'   => 'Had a great time meeting fellow developers at the Indo Dev Meetup 2025!
                                    Lots of inspiring talks and interesting discussions around AI and startup culture.
                                    Always refreshing to connect with passionate people in tech. 🤝',
            ],
            [
                'post_type'       => 'Daily',
                'user_id'       => 'U028',
                'company_id'       => NULL,
                'description'   => 'Great coffee and even greater conversations at today’s Jakarta Tech Community Gathering.
                                    I learned a lot about mobile app trends and local innovation stories.
                                    Events like these remind me why I love being part of this ecosystem.',
            ],
        ]);
    }
}
