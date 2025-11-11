<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSalary;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_id'   => 'required|exists:companies,company_id',
            'title'        => 'required|string|max:50',
            'description'  => 'required|string',
            'min_salary'   => 'required|numeric|min:0',
            'max_salary'   => 'required|numeric|gte:min_salary',
        ]);
        DB::beginTransaction();

        try {
            // 3️⃣ Simpan data job ke tabel jobs
            $job = Job::create([
                'company_id'    => $request->company_id,
                'title'         => $request->title,
                'employment_id' => $request->employment_id,
                'mode_id'       => $request->mode_id,
            ]);

            // 4️⃣ Simpan salary terkait job_id yang baru dibuat
            JobSalary::create([
                'job_id'     => $job->job_id,
                'min_salary' => $request->min_salary,
                'max_salary' => $request->max_salary,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Job and salary created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create job: ' . $e->getMessage());
        }
    }

    
}
