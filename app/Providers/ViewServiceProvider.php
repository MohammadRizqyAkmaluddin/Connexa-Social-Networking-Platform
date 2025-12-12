<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // ← ini yang benar
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use App\Models\Connection;
use App\Models\Notification;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('components.navbar-main', function ($view) {

            $user = Auth::user();

            $companies = $user
                ? $user->accessCompanies()->with('overviews', 'roles', 'jobs')->get()
                : collect();

            $latestMessagesIds = Message::selectRaw('
                CASE
                    WHEN sender_id = ? THEN receiver_id
                    ELSE sender_id
                END as other_user_id,
                MAX(message_id) as last_message_id
            ', [$user->user_id])
            ->where(function ($q) use ($user) {
                $q->where('sender_id', $user->user_id)
                ->orWhere('receiver_id', $user->user_id);
            })
            ->groupBy('other_user_id')
            ->get()
            ->pluck('last_message_id');

            $unreadUsersCount = Message::where('receiver_id', $user->user_id)
            ->where('status', 'New')
            ->distinct('sender_id')
            ->count('sender_id');

            $invitationCount = Connection::with('user')
            ->where('user_target', $user->user_id)
            ->where('status', 'Pending')
            ->orderBy('created_at', 'DESC')
            ->count('user_id');

            $notificationCount = Notification::with('user')
                ->where('user_id', $user->user_id)
                ->where('status', 'New')
                ->count('user_id');

            $view->with('companies', $companies)
                 ->with('unreadUsersCount', $unreadUsersCount)
                 ->with('invitationCount', $invitationCount)
                 ->with('notificationCount', $notificationCount);
        });

    }


}
