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
                'image'     => 'post1.1.jpg'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.1.jpg'
            ],
            [
                'post_id'   => '2',
                'image'     => 'post2.2.jpg'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.1.jpg'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.2.jpg'
            ],
            [
                'post_id'   => '3',
                'image'     => 'post3.3.png'
            ],
            [
                'post_id'   => '4',
                'image'     => 'post4.1.jpg'
            ],
            [
                'post_id'   => '4',
                'image'     => 'post4.2.jpg'
            ],
            [
                'post_id'   => '4',
                'image'     => 'post4.3.jpg'
            ],
            [
                'post_id'   => '5',
                'image'     => 'post5.1.jpg'
            ],
            [
                'post_id'   => '6',
                'image'     => 'post6.1.jpg'
            ],
            [
                'post_id'   => '7',
                'image'     => 'post7.1.jpg'
            ],
            [
                'post_id'   => '7',
                'image'     => 'post7.2.jpg'
            ],
            [
                'post_id'   => '7',
                'image'     => 'post7.3.jpeg'
            ],
            [
                'post_id'   => '8',
                'image'     => 'post8.1.jpg'
            ],
            [
                'post_id'   => '8',
                'image'     => 'post8.2.jpg'
            ],
            [
                'post_id'   => '8',
                'image'     => 'post8.3.jpeg'
            ],
        ]);
    }
}
