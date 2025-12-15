<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Applicant;
use App\Models\Notification;
use App\Models\Message;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $applicants = Applicant::all();

        foreach ($applicants as $app) {

            Notification::create([
                'title'        => $this->buildTitle($app->status, $app->progress),
                'description'  => $this->buildDescription($app->status, $app->progress),
                'category'     => 'Application',
                'status'       => $this->mapNotificationStatus($app->status),
                'user_id'      => $app->user_id,
                'applicant_id' => $app->applicant_id,
                'post_id'      => $app->post_id,
                'created_at'   => $faker->dateTimeBetween('-3 months', 'now'),
            ]);
        }

        $messages = Message::with('sender')->get();

        foreach ($messages as $msg) {

            Notification::create([
                'title'       => '<strong>' . $msg->sender->name . '</strong> sent you a message',
                'description' => $msg->message,
                'category'    => 'Message',
                'status'      => $msg->status,
                'user_id'     => $msg->receiver_id,
                'sender_id'   => $msg->sender_id,
                'created_at'  => $msg->created_at,
            ]);
        }
    }

    private function buildTitle($status, $progress)
    {
        if ($status === 'Rejected') {
            return "Rejected on {$progress}";
        }

        if ($status === 'Pass' && $progress === 'Passed') {
            return "Application Passed";
        }

        return "{$progress} Stage Update";
    }

    private function buildDescription($status, $progress)
    {
        return match ($status) {
            'Rejected'    => "Unfortunately, you were not selected during the {$progress} stage.",
            'Pass'        => "Congratulations! You have successfully passed the {$progress} stage.",
            'On Progress' => "Your application is currently in the {$progress} stage.",
            default       => "Application status updated.",
        };
    }

    private function mapNotificationStatus($status)
    {
        return match ($status) {
            'Rejected', 'Pass' => 'Completed',
            default            => 'On Progress',
        };
    }
}
