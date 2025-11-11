<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'page_id'           => 'required|exists:pages,page_id',
            'name'              => 'required|string|max:50',
            'industry'          => 'required|string|max:50',
            'tagline'           => 'required|string|max:250',
            'established_date'  => 'required|date',
            'country'           => 'required|string|max:50',
            'city'              => 'required|string|max:50',
        ]);
        $company = new Company();
        $company->page_id = $request->page_id;
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->tagline = $request->tagline;
        $company->established_date = $request->established_date;
        $company->country = $request->country;
        $company->city = $request->city;
        $company->save();

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
        
        $binusStudent = User::whereHas('experiences', function ($exp) use ($company_id) {
                $exp->where('company_id', $company_id);
            })
            ->whereHas('userEducations', function ($edu) {
                $edu->where('company_id', 'C009');
            })
            ->with([
                'experiences.company',
                'userEducations.company'
            ])
            ->inRandomOrder()
            ->get();

        $harvardStudent = User::whereHas('experiences', function ($exp) use ($company_id) {
                $exp->where('company_id', $company_id);
            })
            ->whereHas('userEducations', function ($edu) {
                $edu->where('company_id', 'C011');
            })
            ->with([
                'experiences.company',
                'userEducations.company'
            ])
            ->inRandomOrder()
            ->get();

        return view('pages.company-profile', compact('company', 'binusStudent', 'harvardStudent'));
    }



}
