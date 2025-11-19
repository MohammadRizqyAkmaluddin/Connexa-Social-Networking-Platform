<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobSaved;

class JobSavedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,job_id'
        ]);

        $userID = Auth::id();
        $jobID  = $request->job_id;

        $existingSaved = JobSaved::where('job_id', $jobID)
                                 ->where('user_id', $userID)
                                 ->first();

        if($existingSaved) {
            JobSaved::where('job_id', $jobID)
                    ->where('user_id', $userID)
                    ->delete();
            $message = 'Succesfully remove job';
        } else {
            JobSaved::create([
                'job_id' => $jobID,
                'user_id' => $userID
            ]);
            $message = 'Succesfully saved job';
        }
        return redirect()->back()->with('success', $message);
    }

}
