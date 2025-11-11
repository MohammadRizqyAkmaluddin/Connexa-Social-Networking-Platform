<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OverviewSeeder extends Seeder
{
    public function run(): void
    {
        $overviews = [
            ['company_id' => 'C001', 'overview' => 'Every company has a mission. Whats ours? To empower every person and every organization to achieve more. We believe technology 
                    can and should be a force for good and that meaningful innovation contributes to a brighter world in the future and today. Our 
                    culture doesnt just encourage curiosity; it embraces it. Each day we make progress together by showing up as our authentic selves. 
                    We show up with a learn-it-all mentality. We show up cheering on others, knowing their success doesnt diminish our own. We show up 
                    every day open to learning our own biases, changing our behavior, and inviting in differences. Because impact matters.'],
            ['company_id' => 'C002', 'overview' => 'Meta mission is to build the future of human connection and the technology that makes it possible. Our technologies help people 
                    connect, find communities, and grow businesses. When Facebook launched in 2004, it changed the way people connect. Apps like Messenger, 
                    Instagram and WhatsApp further empowered billions around the world. Now, Meta is moving beyond 2D screens toward immersive experiences 
                    like augmented and virtual reality to help build the next evolution in social technology. To help create a safe and respectful online 
                    space, we encourage constructive conversations on this page. Please note the following:
                    • Start with an open mind. Whether you agree or disagree, engage with empathy.
                    • Comments violating our Community Standards will be removed or hidden. Please treat everybody with respect.
                    • Keep it constructive. Use your interactions here to learn about and grow your understanding of others.
                    • Our moderators are here to uphold these guidelines for the benefit of everyone, every day.
                    • If you are seeking support for issues related to your Facebook account, please reference our Help Center (https://www.facebook.com/help) 
                    or Help Community (https://www.facebook.com/help/community). For a full listing of our jobs, visit https://www.metacareers.com'],
            ['company_id' => 'C003', 'overview' => 'Facebook helps you connect and share with the people you care about. From sharing life’s moments to discovering communities, we believe a little connection can go a long way.'],
            ['company_id' => 'C004', 'overview' => 'Instagram brings you closer to the people and things you love. We believe that everyday acts of creativity — from larger gestures (such as Reels creation) to smaller gestures 
                    (such as a Story reaction) — have the power to spark new connections and strengthen existing ones.'],
            ['company_id' => 'C005', 'overview' => 'We’re a diverse collective of thinkers and doers, continually reimagining what’s possible to help us all do what we love in new ways. 
                    And the same innovation that goes into our products also applies to our practices — strengthening our commitment to leave the world better 
                    than we found it. This is where your work can make a difference in people’s lives. Including your own. Apple is an equal opportunity employer 
                    that is committed to inclusion and diversity. Visit apple.com/careers to learn more.'],
            ['company_id' => 'C006', 'overview' => 'GoTo is the largest technology group in Indonesia, combining on-demand and financial services through the Gojek and GoTo Financial brands. 
                     It is the first platform in Southeast Asia to host these two essential use cases in one ecosystem, capturing a majority of Indonesian consumer 
                     household expenditure. GoTo’s mission is to “Empower Progress” by offering an unparalleled selection of goods and services through a comprehensive 
                     merchant and partner network and promoting financial inclusion through its leading payments and financial services business.'],
            ['company_id' => 'C007', 'overview' => 'Tokopedia is an Indonesian technology company with a mission to democratize commerce through technology. Since its founding in 2009, Tokopedia 
                    has been a force that pioneers digital transformation in Indonesia. Consistent in building a bridge to connect millions of people, we have now 
                    reached more than 99% of districts and empowered more than 14 million registered merchants across Indonesia. Our vision is to build a Super 
                    Ecosystem where anyone can start and discover anything. To achieve that, we are working hand in hand with various strategic partners while also 
                    providing more than 500,000 payment points across Indonesia, and offering more than 40 digital products that simplify the lives of many.'],
            ['company_id' => 'C008', 'overview' => 'Gojek is GoTo Group’s on-demand services platform and a pioneer of the multi-service ecosystem model, providing consumers with mobility, 
                    food delivery and logistics solutions. We were founded on the principle of leveraging technology to solve the daily frictions faced by consumers 
                    and businesses, while improving quality of life for millions of people across Southeast Asia, particularly those in the informal sector and micro, 
                    small and medium enterprises (MSMEs).'],
            ['company_id' => 'C009', 'overview' => 'The journey of Bina Nusantara University began on October 21, 1974. It originated from a short-term course named Modern Computer Course, which then expanded because of its strong foundation and comprehensive vision.
                    Due to the high demand and its rapid development, on July 1, 1981, Modern Computer Course had developed into ‘Akademi Teknik Komputer (ATK)’ or Computer Technical Academy with ‘Manajemen Informatika’ or Informatics Management as the first major.
                    The ATK obtained registered on July 13, 1984 and a year after that, exactly on July 1, 1985, the institution changed into AMIK Jakarta. On September 21, 1985, AMIK Jakarta changed its name into AMIK Bina Nusantara.
                    AMIK Bina Nusantara recorded a remarkable achievement in its relatively young age when it was chosen as the best Computer Academy by The Ministry of Education and Culture through The Higher Education Board District III on March 17, 1986. The need for professional workers in the Information Technology area drove AMIK further into development, and on July 1, 1986 it was officially listed as ‘Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK)’ or Institute of Information Management and Computer Science Bina Nusantara.
                    On November 9, 1987, a merger between AMIK Bina Nusantara and STMIK Bina Nusantara took place. The institution conducted Diploma (D-3) and Undergraduate (S-1) programs. An accreditation status of ‘Disamakan’ or ‘Equalized’ for all majors and levels was earned on March 18, 1992. On the next year, STMIK Bina Nusantara opened the first Masters (S-2) Program in Information System Management in Indonesia. The program was officially listed on May 10, 1993.
                    After going through years of perseverance and hard work, Bina Nusantara University (Universitas Bina Nusantara or UBINUS) was officially listed and established on August 8, 1996. STMIK Bina Nusantara was then merged into Bina Nusantara University on December 20, 1998. At that time, UBINUS has Faculty'],
            ['company_id' => 'C010', 'overview' => 'For more than 40 years, BINA NUSANTARA Group has maintained a fine reputation for innumerable positive contributions to Indonesia. Here at BINUS, the teaching and learning processes are highly valued, where teachers work hand-in-hand with students in order to achieve their personal best. The four school campuses are eco-educational, multi denominational, and cater to preschool to high school students. BINUS SCHOOL also leverage enormous IT infrastructure and resources for which BINA NUSANTARA is well known for. Numerous community-oriented services, inter-school events, international student conferences, both local and overseas immersions and to further enrich the multi-faceted development of BINUS SCHOOL students.'],
            ['company_id' => 'C011', 'overview' => 'Harvard University is devoted to excellence in teaching, learning, and research, and to developing leaders in many disciplines who make a difference globally. Founded in 1636, Harvard is the oldest institution of higher learning in the United States.

The official flagship Harvard social media channels are maintained by Harvard Public Affairs and Communications and aim to provide access to the people, places, events, news and research at our Institution. We ask that all visitors to Harvard’s digital spaces be civil to one another and to the site editors. Personal attacks, profanity, commercial solicitations, spam, misinformation or other inappropriate contributions are grounds for comment removal. We ask that you stay on topic when contributing to a discussion and refrain from duplicate posts.

Hateful or discriminatory comments regarding race, ethnicity, religion, gender, disability, sexual orientation, or political beliefs will not be tolerated. The page administrators reserve the right to delete inappropriate or abusive comments and to permanently ban or block users from the Harvard social media accounts.'],
            ['company_id' => 'C012', 'overview' => 'Ubisoft is a global leader in gaming with teams across the world crafting original and memorable gaming experiences featuring brands such as Assassin’s Creed®, Brawlhalla®, For Honor®, Far Cry®, Tom Clancy’s Ghost Recon®, Just Dance®, Rabbids®, Tom Clancy’s Rainbow Six®, The Crew® and Tom Clancy’s The Division®. 

We believe diverse perspectives help both players and teams thrive. If you’re passionate about innovation and pushing entertainment boundaries, join our journey and help us create the unknown! '],
            ['company_id' => 'C013', 'overview' => 'As Indonesias largest private bank, BCA continues to pursue sustainable development through its key principles of Customer Focus, Integrity, Teamwork, and Pursuit of Excellence. BCA seeks to provide an ideal working environment in which all workers can grow. BCA also makes constant contributions to the nation and empowers communities.'],
        ];
        DB::table('overviews')->insert($overviews);
    }
}

