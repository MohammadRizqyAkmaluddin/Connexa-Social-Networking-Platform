<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('likes')->insert ([
            [
                'post_id' => '1',
                'user_id' => 'U002',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U003',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U005',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U087',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U018',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U029',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U030',
            ],
            [
                'post_id' => '1',
                'user_id' => 'U055',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U018',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U039',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U040',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U015',
            ],
            [
                'post_id' => '2',
                'user_id' => 'U029',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U038',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U019',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U017',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U001',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U004',
            ],
            [
                'post_id' => '3',
                'user_id' => 'U009',
            ],
        ]);   
    }
}
