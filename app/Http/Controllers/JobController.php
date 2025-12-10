<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSalary;
use App\Models\Applicant;
use App\Models\Employment;
use App\Models\Mode;
use App\Models\Ads;
use App\Models\Company;
use App\Models\JobSaved;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_id'    => 'required|exists:companies,company_id',
            'title'         => 'required|string|max:50',
            'employment_id' => 'required|exists:employment,employment_id',
            'mode_id'       => 'required|exists:modes,mode_id',
            'min_salary'    => 'required|numeric|min:0',
            'max_salary'    => 'required|numeric|gte:min_salary',
            'job_details'   => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {

            $job = Job::create([
                'company_id'    => $request->company_id,
                'title'         => $request->title,
                'employment_id' => $request->employment_id,
                'mode_id'       => $request->mode_id,
                'job_details'   => $request->job_details,
            ]);

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


    public function index(Request $request)
    {
        $userId = Auth::user()->user_id;

        $jobs = Job::with(['company','mode','employment','salary'])
            ->withCount([
                'applicant as is_applied' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                },
                'jobsaved as is_saved' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                }
            ])
            ->latest();

        // --- FILTER SEARCH ---
        if ($request->filled('search')) {
            $q = $request->search;
            $jobs->where(function ($query) use ($q) {
                $query->where('title', 'like', "%$q%")
                    ->orWhereHas('company', function ($company) use ($q) {
                        $company->where('name', 'LIKE', "%$q%")
                            ->orWhere('city', 'LIKE', "%$q%")
                            ->orWhere('country', 'LIKE', "%$q%");
                    })
                    ->orWhereHas('employment', function ($employment) use ($q) {
                        $employment->where('employment_type', 'LIKE', "%$q%");
                    })
                    ->orWhereHas('mode', function ($mode) use ($q) {
                        $mode->where('mode', 'LIKE', "%$q%");
                    });
            });
        }

        // --- FILTER SALARY ---
        if ($request->filled('min_salary')) {
            $jobs->whereHas('salary', function ($salary) use ($request) {
                $salary->where('min_salary', '>=', $request->min_salary);
            });
        }

        // --- FILTER MODE ---
        if ($request->filled('mode')) {
            $jobs->where('mode_id', $request->mode);
        }

        // --- FILTER EMPLOYMENT ---
        if ($request->filled('employment')) {
            $jobs->where('employment_id', $request->employment);
        }

        $jobs = $jobs->paginate(10)->withQueryString();

        $applied = Applicant::where('user_id', $userId)
                ->with('job.company', 'job.salary', 'job.mode','job.employment')
                ->get();
        $saved = JobSaved::where('user_id', $userId)
                ->with('job.company', 'job.salary', 'job.mode','job.employment')
                ->get();

        $employmentList = Employment::all();
        $modeList = Mode::all();
        $ads = Ads::limit(1)->inRandomOrder()->get();
        $companyList = Company::all();

        return view('pages.jobs', compact('jobs', 'employmentList', 'modeList', 'ads', 'companyList', 'applied', 'saved'));
    }



    public function show($jobID)
    {

        $detail = Job::with('salary', 'applicant')->where('job_id', $jobID)->get();

        return view('pages.jobs', compact('detail'));
    }

    public function applicationStore(Request $request)
    {

        $request->validate([
            'user_id'        => 'required|exists:users,user_id',
            'job_id'         => 'required|exists:jobs,job_id',
            'resume_file'    => 'required|file|mimes:pdf,doc,docx|max:2048',
            'portfolio_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter'   => 'nullable|string',
            'status'         => 'required|string'
        ]);

        $uploadPath = public_path('FILE/');
        $userId = $request->user_id;
        $resume = $request->file('resume_file');
        $resumeExt = $resume->getClientOriginalExtension();
        $resumeName ="Resume_{$userId}." . $resumeExt;

        $oldResume = $uploadPath . $resumeName;
        if (file_exists($oldResume)) {
            unlink($oldResume);
        }

        $resume->move($uploadPath, $resumeName);

        $portfolioName = null;

        if ($request->hasFile('portfolio_file')) {
            $portfolio = $request->file('portfolio_file');
            $portfolioExt = $portfolio->getClientOriginalExtension();
            $portfolioName = "Portfolio_{$userId}." . $portfolioExt;

            $oldPortfolio = $uploadPath . $portfolioName;
            if (file_exists($oldPortfolio)) {
                unlink($oldPortfolio);
            }
            $portfolio->move($uploadPath, $portfolioName);
        }

        Applicant::create([
            'user_id'        => $request->user_id,
            'job_id'         => $request->job_id,
            'resume_file'    => $resumeName,
            'portfolio_file' => $portfolioName,
            'cover_letter'   => $request->cover_letter,
            'status'         => $request->status
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

}
