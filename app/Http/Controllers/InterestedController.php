<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interested;
use Illuminate\Support\Facades\Auth;

class InterestedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,company_id'
        ]);
        $userID = Auth::id();
        $companyID = $request->company_id;

        $existingInterest = Interested::where('company_id', $companyID)
                                      ->where('user_id', $userID)
                                      ->first();
        if($existingInterest) {
            Interested::where('company_id', $companyID)
                      ->where('user_id', $userID)
                      ->delete();
            $message = 'Successfully remove interest';
        } else {
            Interested::create([
                'company_id' => $companyID,
                'user_id'    => $userID
            ]);
            $message = 'Successfully added to interest company list';
        }
        return redirect()->back()->with('success', $message);
    }
}
