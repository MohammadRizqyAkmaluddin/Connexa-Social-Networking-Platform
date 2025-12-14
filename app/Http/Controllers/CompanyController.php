<?php

namespace App\Http\Controllers;

use App\Models\AccessManagement;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Industry;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index ()
    {
        $userId = Auth::user()->user_id;

        $companies = Company::with('follows')
            ->get();

        return view('pages.suggestion', compact('companies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'page_id'           => 'required|exists:pages,page_id',
            'name'              => 'required|string|max:50',
            'sector'            => 'required|string|max:50',
            'industry'          => 'required|string|max:50',
            'tagline'           => 'nullable|string|max:250',
            'established_date'  => 'required|date',
            'country'           => 'required|string|max:50',
            'city'              => 'required|string|max:50',
            'website'           => 'nullable|url',
            'employee'          => 'nullable|string|max:50',
            'logo'              => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $lastCompany = Company::orderBy('company_id', 'desc')->first();

        if ($lastCompany) {
            $lastNumber = intval(substr($lastCompany->company_id, 1));
            $newId = 'C' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'C001';
        }

        $logoName = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $logoName = 'logo-' . $newId . '-' . time() . '.' . $logo->getClientOriginalExtension();

            $logo->move(public_path('IMG/uploads/logo'), $logoName);
        }

        Company::create([
            'company_id'        => $newId,
            'page_id'           => $request->page_id,
            'name'              => $request->name,
            'sector'            => $request->sector,
            'industry'          => $request->industry,
            'tagline'           => $request->tagline,
            'established_date'  => $request->established_date,
            'country'           => $request->country,
            'city'              => $request->city,
            'website'           => $request->website,
            'employee'          => $request->employee,
            'logo'              => $logoName
        ]);

        AccessManagement::create([
            'company_id' => $newId,
            'user_id'    => $request->user_id
        ]);

        return redirect()->back()->with('success', 'Successfully Create Page');
    }


    public function showCreatePage()
    {
        $industries = Industry::all();

        return view('pages.create-company', compact('industries'));
    }

    public function show($company_id)
    {
        $company = Company::withCount(['follows', 'experiences'])
            ->with([
                'subsidiaries.childCompany',
                'parentRelation.parentCompany',
                'overviews',
                'roles.user',
                'posts.user',
                'posts.postImages',
                'jobs.salary',
                'educations.user',
                'experiences.user'
            ])
            ->where('company_id', $company_id)
            ->firstOrFail();

        // data binus & harvard student (biarkan tetap)
        $binusStudent = User::whereHas('experiences', function ($exp) use ($company_id) {
                $exp->where('company_id', $company_id);
            })
            ->whereHas('userEducations', function ($edu) {
                $edu->where('company_id', 'C009');
            })
            ->with(['experiences.company', 'userEducations.company'])
            ->inRandomOrder()
            ->get();

        $harvardStudent = User::whereHas('experiences', function ($exp) use ($company_id) {
                $exp->where('company_id', $company_id);
            })
            ->whereHas('userEducations', function ($edu) {
                $edu->where('company_id', 'C011');
            })
            ->with(['experiences.company', 'userEducations.company'])
            ->inRandomOrder()
            ->get();

        // === Tambahan: perhitungan data bar chart pendidikan ===
        // Ambil semua user yang punya experience di company ini
        $users = User::whereHas('experiences', function ($exp) use ($company_id) {
                $exp->where('company_id', $company_id);
            })
            ->with('userEducations.company')
            ->get();

        $totalUsers = $users->count(); // total unik user kerja di company ini

        $educationCounts = [];

        foreach ($users as $user) {
            // ambil kampus unik per user (biar ga dobel Bachelor & Master di kampus sama)
            $uniqueEduCompanies = $user->userEducations
                                ->whereIn('company_id', ['C009', 'C010', 'C011'])
                                ->pluck('company.name')
                                ->unique();

            foreach ($uniqueEduCompanies as $eduCompanyName) {
                if (!isset($educationCounts[$eduCompanyName])) {
                    $educationCounts[$eduCompanyName] = 0;
                }
                $educationCounts[$eduCompanyName]++;
            }
        }

        // hitung persentase
        $educationPercentages = [];
        foreach ($educationCounts as $univ => $count) {
            $educationPercentages[$univ] = $totalUsers > 0
                ? round(($count / $totalUsers) * 100, 1)
                : 0;
        }

        // kalau mau urut dari yang paling banyak ke paling sedikit
        arsort($educationPercentages);

        return view('pages.company-profile', compact(
            'company',
            'binusStudent',
            'harvardStudent',
            'educationPercentages',
            'totalUsers'
        ));
    }




}
