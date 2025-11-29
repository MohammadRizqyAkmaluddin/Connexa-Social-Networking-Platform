<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Connection;
use App\Models\User;

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
        Message::create([
            'sender_id'   => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'status'      => $request->status,
            'message'     => $request->message
        ]);
        $activeTab = $request->input('active_tab2');

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

        $activeUsers = DB::table('sessions')
            ->whereNotNull('user_id')
            ->where('last_activity', '>', Carbon::now()->subMinutes(5)->getTimestamp())
            ->pluck('user_id')  // ambil user_id yang online saja
            ->toArray();

        $connection = Connection::with('user', 'target')
            ->where('user_id', $user->user_id)
            ->where('status', 'Success')
            ->orWhere('user_target', $user->user_id)
            ->where('status', 'Success')
            ->get();

        return view('pages.message', compact('chats', 'activeUsers', 'connection'));
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
