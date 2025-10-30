<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            [ 'post_id' => '1', 'user_id' => 'U012', 'comment' => 'Totally agree! Clean code saves everyone’s time in the long run.' ],
            [ 'post_id' => '1', 'user_id' => 'U034', 'comment' => 'Clarity always beats clever tricks, especially when working in large teams.' ],
            [ 'post_id' => '1', 'user_id' => 'U077', 'comment' => 'Love this mindset. Maintainability is what makes real developers stand out.' ],
            [ 'post_id' => '1', 'user_id' => 'U045', 'comment' => 'So true! Readable code is a form of respect to your future self.' ],
            [ 'post_id' => '1', 'user_id' => 'U009', 'comment' => 'This should be printed in every dev office. Simplicity > complexity!' ],
            [ 'post_id' => '1', 'user_id' => 'U063', 'comment' => 'Responsibility is underrated in programming culture. Thanks for sharing this.' ],
            [ 'post_id' => '1', 'user_id' => 'U018', 'comment' => 'Exactly! Writing clean code helps new team members onboard faster.' ],
            [ 'post_id' => '1', 'user_id' => 'U041', 'comment' => 'The best engineers I’ve worked with always prioritize readability. It’s so underrated.' ],
            [ 'post_id' => '1', 'user_id' => 'U028', 'comment' => 'Great reminder. Clean code also improves debugging and testing later on.' ],
            [ 'post_id' => '1', 'user_id' => 'U002', 'comment' => 'This post hits hard. I’ve seen teams collapse because of messy codebases.' ],
            [ 'post_id' => '1', 'user_id' => 'U036', 'comment' => 'Absolutely agree! Developers often forget that clarity saves future effort.' ],
            [ 'post_id' => '1', 'user_id' => 'U069', 'comment' => 'I remember refactoring a legacy project with zero documentation. Clean code would have saved weeks of work — this post truly resonates with that pain.' ],

            [ 'post_id' => '2', 'user_id' => 'U026', 'comment' => 'QA automation with AI is such a game changer right now!' ],
            [ 'post_id' => '2', 'user_id' => 'U040', 'comment' => 'I’ve tried Copilot for test generation too, and it’s surprisingly good.' ],
            [ 'post_id' => '2', 'user_id' => 'U089', 'comment' => 'AI-assisted testing is definitely the future. Great topic to explore.' ],
            [ 'post_id' => '2', 'user_id' => 'U053', 'comment' => 'Curious to see how these tools evolve for integration testing.' ],
            [ 'post_id' => '2', 'user_id' => 'U003', 'comment' => 'Automation plus intelligence = unstoppable combo for QA teams!' ],
            [ 'post_id' => '2', 'user_id' => 'U071', 'comment' => 'We just started using Testim at work. It really speeds up regression testing.' ],
            [ 'post_id' => '2', 'user_id' => 'U022', 'comment' => 'Great insights. Smart testing is the next big productivity leap.' ],
            [ 'post_id' => '2', 'user_id' => 'U008', 'comment' => 'Copilot helps so much in writing repetitive test cases. Such a time saver.' ],
            [ 'post_id' => '2', 'user_id' => 'U064', 'comment' => 'I think soon AI will handle not just tests but also bug triaging automatically.' ],
            [ 'post_id' => '2', 'user_id' => 'U043', 'comment' => 'Loved this. AI’s role in QA is often underestimated in software discussions.' ],
            [ 'post_id' => '2', 'user_id' => 'U057', 'comment' => 'The blend between human insight and AI efficiency will define modern QA.' ],
            [ 'post_id' => '2', 'user_id' => 'U010', 'comment' => 'Tools like Testim and Copilot are revolutionizing how testers think. Imagine having a system that predicts what might break before deployment — that’s where AI is headed, and it’s thrilling.' ],
            [ 'post_id' => '2', 'user_id' => 'U060', 'comment' => 'I believe AI will not replace testers but will empower them to focus on creative and logical test design instead of repetitive scripts.' ],
            [ 'post_id' => '2', 'user_id' => 'U038', 'comment' => 'Using AI in QA saved us tons of time in regression testing last sprint.' ],

            [ 'post_id' => '3', 'user_id' => 'U007', 'comment' => 'Congrats! That’s a tough exam. You’ve definitely earned it.' ],
            [ 'post_id' => '3', 'user_id' => 'U028', 'comment' => 'Well done! AWS certifications open so many doors in cloud careers.' ],
            [ 'post_id' => '3', 'user_id' => 'U059', 'comment' => 'Respect! Those late-night study sessions always pay off eventually.' ],
            [ 'post_id' => '3', 'user_id' => 'U084', 'comment' => 'Amazing achievement! Can’t wait to see what projects you tackle next.' ],
            [ 'post_id' => '3', 'user_id' => 'U002', 'comment' => 'This motivates me to start my own AWS journey soon!' ],
            [ 'post_id' => '3', 'user_id' => 'U068', 'comment' => 'Congratulations! Cloud architecture skills are in huge demand now.' ],
            [ 'post_id' => '3', 'user_id' => 'U013', 'comment' => 'That’s a major milestone! I remember failing twice before passing mine — so I know the effort it takes. Hats off for the dedication and consistency.' ],

            [ 'post_id' => '4', 'user_id' => 'U031', 'comment' => 'Huge congrats to the team! Delivering systems like that is no small feat.' ],
            [ 'post_id' => '4', 'user_id' => 'U025', 'comment' => 'Proud of you all! The HRMS launch looks super polished and functional.' ],
            [ 'post_id' => '4', 'user_id' => 'U036', 'comment' => 'Teamwork really does make the dream work. Congrats on the release!' ],
            [ 'post_id' => '4', 'user_id' => 'U011', 'comment' => 'Great achievement! The debugging phase is always the hardest part.' ],
            [ 'post_id' => '4', 'user_id' => 'U080', 'comment' => 'This is awesome news! Love seeing real project success stories.' ],
            [ 'post_id' => '4', 'user_id' => 'U051', 'comment' => 'Impressive! Hope the client is as happy as the dev team right now.' ],
            [ 'post_id' => '4', 'user_id' => 'U066', 'comment' => 'Congrats! Always inspiring to see projects go from plan to launch.' ],
            [ 'post_id' => '4', 'user_id' => 'U020', 'comment' => 'Fantastic milestone! The screenshots on LinkedIn look great.' ],
            [ 'post_id' => '4', 'user_id' => 'U073', 'comment' => 'The testing phase must’ve been intense. Kudos for making it live!' ],
            [ 'post_id' => '4', 'user_id' => 'U008', 'comment' => 'Really inspiring! You all must feel proud after months of effort.' ],
            [ 'post_id' => '4', 'user_id' => 'U021', 'comment' => 'Well-deserved success! Collaboration truly pays off in projects like these.' ],
            [ 'post_id' => '4', 'user_id' => 'U055', 'comment' => 'This reminds me how rewarding it feels when everything finally works flawlessly after so many bugs and tests. Great job to the whole team!' ],
            [ 'post_id' => '4', 'user_id' => 'U074', 'comment' => 'Massive respect to teams that deliver under tight deadlines. Incredible effort!' ],
            [ 'post_id' => '4', 'user_id' => 'U014', 'comment' => 'Projects like this prove how teamwork and patience always win.' ],
            [ 'post_id' => '4', 'user_id' => 'U049', 'comment' => 'Congrats to everyone involved! Your perseverance clearly paid off.' ],

            [ 'post_id' => '5', 'user_id' => 'U037', 'comment' => 'Congratulations on the new role! Tokopedia is lucky to have you.' ],
            [ 'post_id' => '5', 'user_id' => 'U020', 'comment' => 'Best of luck in your new journey! Growth never stops.' ],
            [ 'post_id' => '5', 'user_id' => 'U073', 'comment' => 'Such an exciting move! Backend engineering suits you perfectly.' ],
            [ 'post_id' => '5', 'user_id' => 'U006', 'comment' => 'TechCore must be proud. Wishing you great success ahead!' ],
            [ 'post_id' => '5', 'user_id' => 'U033', 'comment' => 'Cheers to new beginnings and continuous learning!' ],
            [ 'post_id' => '5', 'user_id' => 'U081', 'comment' => 'You deserve it! Can’t wait to see your impact at Tokopedia.' ],
            [ 'post_id' => '5', 'user_id' => 'U015', 'comment' => 'Changing roles after years in one company takes courage — respect for taking that step!' ],
            [ 'post_id' => '5', 'user_id' => 'U054', 'comment' => 'Leaving comfort zones is never easy, but that’s where growth happens. Wishing you all the success in your new role, and may you continue inspiring others in tech!' ],

            [ 'post_id' => '6', 'user_id' => 'U061', 'comment' => 'Endings are bittersweet, but exciting times lie ahead!' ],
            [ 'post_id' => '6', 'user_id' => 'U044', 'comment' => 'Good luck for whatever comes next. You’ll do great!' ],
            [ 'post_id' => '6', 'user_id' => 'U005', 'comment' => 'Farewell, but also congratulations on your next chapter!' ],
            [ 'post_id' => '6', 'user_id' => 'U058', 'comment' => 'Sounds like a meaningful journey. Best wishes for your future plans.' ],
            [ 'post_id' => '6', 'user_id' => 'U013', 'comment' => 'You’ll definitely be missed. Keep shining wherever you go!' ],
            [ 'post_id' => '6', 'user_id' => 'U074', 'comment' => 'Big respect for acknowledging the lessons learned. Onward and upward!' ],
            [ 'post_id' => '6', 'user_id' => 'U027', 'comment' => 'Your reflection really captures what makes team experiences valuable. It’s always about people, not just projects.' ],

            [ 'post_id' => '7', 'user_id' => 'U016', 'comment' => 'I was there too! Amazing talks and such friendly people.' ],
            [ 'post_id' => '7', 'user_id' => 'U067', 'comment' => 'Meetups like this always recharge my motivation. Loved it!' ],
            [ 'post_id' => '7', 'user_id' => 'U019', 'comment' => 'Hope they do another one soon. So much to learn and share.' ],
            [ 'post_id' => '7', 'user_id' => 'U027', 'comment' => 'Networking with devs in person hits differently after remote work years.' ],
            [ 'post_id' => '7', 'user_id' => 'U082', 'comment' => 'AI and startup sessions were the highlight for me!' ],
            [ 'post_id' => '7', 'user_id' => 'U035', 'comment' => 'Glad you enjoyed it! The energy there was unreal.' ],
            [ 'post_id' => '7', 'user_id' => 'U024', 'comment' => 'Wish I could attend next time! Sounds like an amazing event.' ],
            [ 'post_id' => '7', 'user_id' => 'U048', 'comment' => 'The AI panel discussion was mind-blowing. Learned so much!' ],
            [ 'post_id' => '7', 'user_id' => 'U039', 'comment' => 'Met so many passionate people at this event — can’t wait for the next!' ],
            [ 'post_id' => '7', 'user_id' => 'U046', 'comment' => 'I came away with new ideas for my startup project after those talks.' ],
            [ 'post_id' => '7', 'user_id' => 'U017', 'comment' => 'So happy to see the local dev scene growing stronger every year.' ],
            [ 'post_id' => '7', 'user_id' => 'U001', 'comment' => 'I loved how open everyone was about sharing their experience and even failures. The community vibe was incredible — you can really feel the collaboration spirit there!' ],

            [ 'post_id' => '8', 'user_id' => 'U004', 'comment' => 'Nothing beats great coffee and tech talks. Such a fun day!' ],
            [ 'post_id' => '8', 'user_id' => 'U043', 'comment' => 'These events really strengthen the local developer ecosystem.' ],
            [ 'post_id' => '8', 'user_id' => 'U085', 'comment' => 'Wish I could attend! Heard the mobile app panel was fantastic.' ],
            [ 'post_id' => '8', 'user_id' => 'U032', 'comment' => 'Loved meeting new people and exchanging startup ideas there!' ],
            [ 'post_id' => '8', 'user_id' => 'U023', 'comment' => 'Events like these are gold — you come for the coffee but stay for the conversations. Always learn something new from people building amazing things locally.' ],
        ];
        
        DB::table('comments')->insert ($comments);   
    }
}
