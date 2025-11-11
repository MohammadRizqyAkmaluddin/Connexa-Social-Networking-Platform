<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Company;
use App\Models\Connection;
use App\Models\Ads;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $educations = $user->userEducations()->with('company')->get();

        $posts = Post::with(['user', 'company', 'comments.user', 'likes.user', 'postImages'])
            ->inRandomOrder()
            ->get();

        $companies = Company::limit(3)->inRandomOrder()->get();

        $connectedIDs = Connection::where(function ($q) use ($user) {
            $q->where('user_id', $user)
              ->orWhere('user_target', $user);
        })
        ->where('status', 'Success')
        ->get()
        ->flatMap(function ($conn) use ($user) {
            // Ambil ID lawan koneksi (bukan dirinya sendiri)
            return $conn->user_id == $user ? [$conn->user_target] : [$conn->user_id];
        })
        ->unique()
        ->values()
        ->all();

        $excludeIDs = array_merge($connectedIDs, [$user]);

        $peoples = User::where('user_id', '!=', $user->user_id) // skip diri sendiri
            ->whereDoesntHave('connectionsAsSender', function ($query) use ($user) {
                $query->where('user_target', $user->user_id)
                    ->where('status', 'success');
            })
            ->whereDoesntHave('connectionsAsTarget', function ($query) use ($user) {
                $query->where('user_id', $user->user_id)
                    ->where('status', 'success');
            })
            ->limit(4)
            ->get();
        
        $ads = Ads::limit(1)->inRandomOrder()->get();

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

        $chats = Message::with(['sender', 'receiver'])
    ->whereIn('message_id', $latestMessagesIds)
    ->orderByDesc('created_at')
    ->limit(4)
    ->get()
    ->map(function($msg) use ($user) {
        return [
            'user' => $msg->sender_id == $user->user_id ? $msg->receiver : $msg->sender,
            'message' => $msg
        ];
    });

    $connection = Connection::get();
        

        return view('pages.homepage', compact('user', 'educations', 'posts', 'companies', 'peoples', 'ads', 'chats', 'connection'));
    }
}
