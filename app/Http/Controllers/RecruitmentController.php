<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;
use App\Models\Applicant;
use App\Models\Notification;

class RecruitmentController extends Controller
{
    public function show(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);
        $majors = Major::all();

        $query = Applicant::where('job_id', $jobId)
            ->with('user');

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('headline', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->major) {
    $query->whereHas('user.userEducations', function ($q) use ($request) {
        $q->where('major_id', $request->major);
    });
}

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $applicants = $query->paginate(4)->appends($request->query());

        return view('pages.recruitment', compact('job', 'majors', 'applicants'));
    }

    public function updateApplication(Request $request)
    {
        $applicant_id = $request->applicant_id;
        $progress = $request->progress;
        $status = $request->status;
        $title = $request->title;
        $description = $request->description;
        $category = $request->category;
        $user_id = $request->user_id;

        Applicant::where('applicant_id', $applicant_id)
            ->update([
                'progress' => $progress,
                'status'   => $status
            ]);

        Notification::create([
            'title'         => $title,
            'applicant_id'  => $applicant_id,
            'description'   => $description,
            'category'      => $category,
            'user_id'       => $user_id,
        ]);

        return redirect()->back()->with('success', 'updated');
    }

    public function rejectApplication(Request $request)
    {
        $applicant_id = $request->applicant_id;
        $title = $request->title;
        $description = $request->description;
        $category = $request->category;
        $user_id = $request->user_id;

        Applicant::where('applicant_id', $applicant_id)
            ->update(['status'   => 'Rejected']);

        Notification::create([
            'title'         => $title,
            'applicant_id'  => $applicant_id,
            'description'  => $description,
            'category'      => $category,
            'user_id'       => $user_id,
        ]);
        return redirect()->back()->with('success', 'updated');
    }

}
