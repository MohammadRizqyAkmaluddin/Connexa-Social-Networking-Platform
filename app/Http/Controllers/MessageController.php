<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Connection;
use App\Models\Notification;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'sender_id'   => 'required|exists:users,user_id',
            'receiver_id' => 'required|exists:users,user_id',
            'status'      => 'required|string',
            'message'     => 'required|string'
        ]);

        $sender   = $request->sender_id;
        $receiver = $request->receiver_id;

        $existing = Message::where(function ($q) use ($sender, $receiver) {
                            $q->where('sender_id', $sender)
                            ->where('receiver_id', $receiver);
                        })
                        ->orWhere(function ($q) use ($sender, $receiver) {
                            $q->where('sender_id', $receiver)
                            ->where('receiver_id', $sender);
                        })
                        ->orderBy('message_id', 'desc')
                        ->first();

        if ($existing) {
            $chatType = $existing->category;
        } else {
            $chatType = $request->type;
        }

        Message::create([
            'sender_id'   => $sender,
            'receiver_id' => $receiver,
            'status'      => $request->status,
            'category'    => $chatType,
            'message'     => $request->message
        ]);

        Notification::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'user_id'     => $receiver,
        ]);

        $activeTab = $request->active_tab2;

        return redirect()->route('message.page', ['active_tab' => $activeTab]);
    }


    public function index()
    {

        $user = Auth::user();

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
            ->get()
            ->map(function ($msg) use ($user) {
                $otherUser = $msg->sender_id == $user->user_id ? $msg->receiver : $msg->sender;

                $allMessages = Message::where(function ($q) use ($user, $otherUser) {
                    $q->where('sender_id', $user->user_id)
                        ->where('receiver_id', $otherUser->user_id);
                })->orWhere(function ($q) use ($user, $otherUser) {
                    $q->where('sender_id', $otherUser->user_id)
                        ->where('receiver_id', $user->user_id);
                })
                    ->orderBy('message_id', 'asc')
                    ->get();

                return [
                    'user' => $otherUser,
                    'message' => $msg,
                    'allMessages' => $allMessages,
                ];
            });

        $jobChats = Message::with(['sender', 'receiver'])
            ->where('category', 'Job')
            ->whereIn('message_id', $latestMessagesIds)
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($msg) use ($user) {
                $otherUser = $msg->sender_id == $user->user_id ? $msg->receiver : $msg->sender;

                $allMessages = Message::where(function ($q) use ($user, $otherUser) {
                    $q->where('sender_id', $user->user_id)
                        ->where('receiver_id', $otherUser->user_id);
                })->orWhere(function ($q) use ($user, $otherUser) {
                    $q->where('sender_id', $otherUser->user_id)
                        ->where('receiver_id', $user->user_id);
                })
                    ->orderBy('message_id', 'asc')
                    ->get();

                return [
                    'user' => $otherUser,
                    'message' => $msg,
                    'allMessages' => $allMessages,
                ];
            });

        $activeUsers = DB::table('sessions')
            ->whereNotNull('user_id')
            ->where('last_activity', '>', Carbon::now()->subMinutes(5)->getTimestamp())
            ->pluck('user_id')
            ->toArray();

        $connection = Connection::with('user', 'target')
            ->where('user_id', $user->user_id)
            ->where('status', 'Success')
            ->orWhere('user_target', $user->user_id)
            ->where('status', 'Success')
            ->get();

        return view('pages.message', compact('chats', 'jobChats', 'activeUsers', 'connection'));
    }

    public function updateStatus(Request $request)
    {
        $authId = Auth::user()->user_id;
        $senderId = $request->input('sender_id');

        Message::where('sender_id', $senderId)
            ->where('receiver_id', $authId)
            ->where('status', 'New')
            ->update(['status' => 'Read']);

        $activeTab = $request->input('active_tab');

        return redirect()->route('message.page', ['active_tab' => $activeTab]);
    }


}
