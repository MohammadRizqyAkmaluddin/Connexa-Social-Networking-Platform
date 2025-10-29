<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_images')->insert([
            [
                'post_id'   => '1',
                'image'     => 'post1.1.png'
            ],
            [
                'post_id'   => '1',
                'image'     => 'post1.2.png'
            ],
            [
                'post_id'   => '1',
                'image'     => 'post1.3.png'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.1.png'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.2.png'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.3.png'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.4.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.1.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.2.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.3.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.4.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.5.png'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.6.png'
            ],
            [
                'post_id'   => '4',
                'image'     => 'post4.1.png'
            ],
            [
                'post_id'   => '5',
                'image'     => 'post4.1.png'
            ],
            [
                'post_id'   => '6',
                'image'     => 'post4.1.png'
            ],
            [
                'post_id'   => '7',
                'image'     => 'post4.1.png'
            ],
            [
                'post_id'   => '8',
                'image'     => 'post4.1.png'
            ],
        ]);
    }
}
