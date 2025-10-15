<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $educations = $user->userEducations()->with('company')->get();
        // dd($user->userEducations, $educations);
        // return view('pages.homepage', compact('user', 'educations'));
        return view('pages.homepage', compact('user', 'educations'));
    }
}
