<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;
use App\Models\Applicant;

class RecruitmentController extends Controller
{
    public function show(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);
        $majors = Major::all();

        // Ambil semua applicant dari job ini
        $query = Applicant::where('job_id', $jobId)
            ->with('user');

        // =============================
        // FILTER SEARCH
        // =============================
        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('headline', 'like', '%' . $request->search . '%');
            });
        }

        // =============================
        // FILTER MAJOR
        // =============================
        if ($request->major) {
    $query->whereHas('user.userEducations', function ($q) use ($request) {
        $q->where('major_id', $request->major);
    });
}

        // =============================
        // FILTER STATUS
        // =============================
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // =============================
        // PAGINATION
        // =============================
        $applicants = $query->paginate(4)->appends($request->query());

        return view('pages.recruitment', compact('job', 'majors', 'applicants'));
    }

}
