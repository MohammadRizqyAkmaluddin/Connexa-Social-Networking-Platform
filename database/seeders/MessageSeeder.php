<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            ['sender_id' => 'U002', 'receiver_id' => 'U001', 'status' => 'Read', 'message' => 'Good morning Rizqy'],
            ['sender_id' => 'U001', 'receiver_id' => 'U002', 'status' => 'Read', 'message' => 'Oh hi Lam, good morning'],
            ['sender_id' => 'U001', 'receiver_id' => 'U002', 'status' => 'Read', 'message' => 'Is there anything i can help you with?'],
            ['sender_id' => 'U002', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Hi cul'],
            ['sender_id' => 'U002', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Can you help me with a web development project?'],
            ['sender_id' => 'U004', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Hi Rizqy, I would like to invite you to the State Palace on August 29th.'],
            ['sender_id' => 'U035', 'receiver_id' => 'U001', 'status' => 'Read', 'message' => 'Hello Rizqy, i am David Müller nice to connect with you'],
            ['sender_id' => 'U001', 'receiver_id' => 'U035', 'status' => 'New', 'message' => 'Hello David, its nice to connect with you'],
            ['sender_id' => 'U068', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Good evening, I would like to offer you to join our company to fill the position of backend developer.'],
            ['sender_id' => 'U087', 'receiver_id' => 'U001', 'status' => 'Job', 'message' => 'Hi Rizqy, I’d like to discuss a new web application for our company.'],
            ['sender_id' => 'U001', 'receiver_id' => 'U083', 'status' => 'Job', 'message' => 'Hello, we’re experiencing some performance issues on our existing system.'],
            ['sender_id' => 'U001', 'receiver_id' => 'U083', 'status' => 'Job', 'message' => 'The application becomes very slow when many users access it at the same time.'],
        ];
        DB::table('messages')->insert($messages);
    }
}
