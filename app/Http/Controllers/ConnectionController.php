<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Connection;
use App\Models\Company;
use App\Models\Ads;
use App\Models\Follow;

class ConnectionController extends Controller
{
    public function index ()
    {
        $userId = Auth::user()->user_id;
        $isRequested = Connection::where('user_id', Auth::user()->user_id)->where('user_target', $userId)->exists();

        $invitation = Connection::with('user')
            ->where('user_target', $userId)
            ->where('status', 'Pending')
            ->orderBy('created_at', 'DESC')
            ->get();

        $connectionIds = Connection::where('user_id', $userId)
            ->pluck('user_target')
            ->merge(Connection::where('user_target', $userId)->pluck('user_id'))
            ->unique()
            ->toArray();

        $users = User::where('user_id', '!=', $userId)
            ->whereNotIn('user_id', $connectionIds)
            ->with('userEducations')
            ->get();

        $companies = Company::with('follows')->get();

        $connection = Connection::with('user', 'target')
            ->where('user_id', $userId)
            ->where('status', 'Success')
            ->orWhere('user_target', $userId)
            ->where('status', 'Success')
            ->get();

        $pending = Connection::with('target')
            ->where('user_id', $userId)
            ->where('status', 'Pending')
            ->get();

        $followed = Follow::with('company')
            ->where('user_id', $userId)
            ->get();

        $ads = Ads::limit(1)->inRandomOrder()->get();

        return view('pages.network', compact('users', 'companies', 'isRequested', 'invitation', 'ads', 'connection', 'followed', 'pending'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,user_id'
        ]);

         $userID = Auth::id();
         $targetID = $request->user_id;

         $existingRequest = Connection::where('user_id', $userID)
                                ->where('user_target', $targetID)
                                ->first();

        if($existingRequest) {
            Connection::where('user_id', $userID)
                  ->where('user_target', $targetID)
                  ->delete();
            $message = 'Request Remove';
        } else {
            Connection::create([
                'user_id'   => $userID,
                'user_target' => $targetID,
                'status'    => 'Pending'
            ]);
            $message = 'Request Send';
        }

        return redirect()->back()->with('success', $message);
    }

    public function update (Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,user_id',
            'user_target' => 'required|exists:users,user_id',
        ]);

        $userID = $request->user_id;
        $targetUser = $request->user_target;

        Connection::where('user_id', $userID)
            ->where('user_target', $targetUser)
            ->where('status', 'Pending')
            ->update(['status' => 'Success']);

        return redirect()->back()->with('success', 'nice');
    }

    public function cancelRequest (Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,user_id',
            'user_target' => 'required|exists:users,user_id',
        ]);

        $userID = $request->user_id;
        $targetUser = $request->user_target;

        Connection::where('user_id', $userID)
            ->where('user_target', $targetUser)
            ->where('status', 'Pending')
            ->delete();
        return redirect()->back()->with('success', 'nice');
    }

}


