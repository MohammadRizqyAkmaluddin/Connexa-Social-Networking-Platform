<?php

namespace App\Http\Controllers;
use App\Models\Applicant;
use App\Models\Job;

use Illuminate\Http\Request;

class AppliedController extends Controller
{
    public function show ($application_id)
    {
        $appliedJob = Applicant::where('applicant_id', $application_id)
                                ->with('user', 'job.salary', 'job.company', 'job.company.accessUsers')
                                ->firstOrFail();

        return view('pages.applied', compact('appliedJob'));
    }
}
