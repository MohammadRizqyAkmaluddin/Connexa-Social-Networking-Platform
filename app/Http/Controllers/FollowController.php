<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,company_id'
        ]);
        
        $userID = Auth::id();
        $companyID = $request->company_id;

        $existingFollow = Follow::where('user_id', $userID)
                                ->where('company_id', $companyID)
                                ->first();

        if($existingFollow) {
            Follow::where('user_id', $userID)
                  ->where('company_id', $companyID)
                  ->delete();
            $message = 'Successfully Unfollowed';
        } else {
            Follow::create([
                'user_id'    => $userID,
                'company_id' => $companyID
            ]);
            $message = 'Successfully Followed';
        }

        return redirect()->back()->with('success', $message);
    }
}
