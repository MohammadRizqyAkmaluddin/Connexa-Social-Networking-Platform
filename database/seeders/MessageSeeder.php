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
            ['sender_id' => 'U002', 'receiver_id' => 'U001', 'status' => 'Read', 'message' => 'Oh hi Laura, good morning'],
            ['sender_id' => 'U001', 'receiver_id' => 'U002', 'status' => 'Read', 'message' => 'Is there anything i can help you with?'],
            ['sender_id' => 'U002', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Can you help me with a web development project?'],
            ['sender_id' => 'U004', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Hi Rizqy, I would like to invite you to the State Palace on August 29th.'],
            ['sender_id' => 'U035', 'receiver_id' => 'U001', 'status' => 'Read', 'message' => 'Hello Rizqy, i am David Müller nice to connect with you'],
            ['sender_id' => 'U001', 'receiver_id' => 'U035', 'status' => 'New', 'message' => 'Hello David, its nice to connect with you'],
            ['sender_id' => 'U068', 'receiver_id' => 'U001', 'status' => 'New', 'message' => 'Good evening, I would like to offer you to join our company to fill the position of backend developer.']
        ];
        DB::table('messages')->insert($messages);
    }
}
