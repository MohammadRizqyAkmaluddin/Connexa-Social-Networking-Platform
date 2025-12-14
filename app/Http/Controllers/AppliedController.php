<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Notification;

use Illuminate\Http\Request;

class AppliedController extends Controller
{
    public function show ($application_id)
    {
        $appliedJob = Applicant::where('applicant_id', $application_id)
                                ->with('user', 'job.salary', 'job.company', 'job.company.accessUsers')
                                ->firstOrFail();

         Notification::where('category', 'Application')
            ->where('applicant_id', $application_id)
            ->where('user_id', Auth::user()->user_id)
            ->where('status', 'New')
            ->update(['status' => 'Seen']);

        return view('pages.applied', compact('appliedJob'));
    }
}
