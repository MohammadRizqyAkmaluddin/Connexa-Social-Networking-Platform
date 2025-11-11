<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Connection;

class ConnectionController extends Controller
{
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
}
