<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class BusinessController extends Controller
{
    public function index()
    {
        $companies = Auth::user()->accessCompanies;

        return view('pages.business', compact('companies'));
    }

    public function show($companyID)
    {
        $company = Company::findOrFail($companyID);

        return view('pages.manage-company', compact('company'));
    }
}
