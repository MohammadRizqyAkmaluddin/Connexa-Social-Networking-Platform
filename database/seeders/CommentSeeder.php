<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comments')->insert ([
            [
                'post_id' => '1',
                'user_id' => 'U012',
                'comment' => 'Totally agree! Clean code saves everyone’s time in the long run.',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U047',
                'comment' => 'Great reminder. Simplicity always wins in code design!',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U033',
                'comment' => 'Interesting point! AI-assisted testing sounds promising.',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U076',
                'comment' => 'Can you share which AI tools you found most useful?',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U015',
                'comment' => 'Congrats on your certification! That’s a big milestone 👏',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U028',
                'comment' => 'Well done! AWS exams are no joke — respect!',
            ],
            [
                'post_id' => '5',
                'user_id' => 'U041',
                'comment' => 'Congrats on the new role! Wishing you great success ahead 🚀',
            ],
            [
                'post_id' => '7',
                'user_id' => 'U034',
                'comment' => 'Such a great event! Glad we finally met in person.',
            ],
            [
                'post_id' => '7',
                'user_id' => 'U056',
                'comment' => 'Loved the discussions on AI — can’t wait for the next meetup!',
            ],
        ]);   
    }
}
