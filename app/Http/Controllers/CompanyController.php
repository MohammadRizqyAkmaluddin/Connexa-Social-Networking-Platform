<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

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
        $company-> tagline = $request->tagline;
        $company->established_date = $request->established_date;
        $company->country = $request->country;
        $company->city = $request->city;
        $company->save();
        

    }
    
}
