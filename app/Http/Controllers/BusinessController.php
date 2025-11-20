<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Mode;
use App\Models\Employment;

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
        $mode = Mode::all();
        $employment = Employment::all();

        return view('pages.manage-company', compact('company', 'mode', 'employment'));
    }
}
