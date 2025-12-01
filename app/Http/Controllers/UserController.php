<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ads;
use App\Models\Company;
use App\Models\Connection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::with('userEducations')->get();

        return view('pages.suggestion', compact('users'));
    }

    public function show ($userId)
    {
        $auth = Auth::user();
        $ads = Ads::limit(1)->inRandomOrder()->get();
        $companies = Company::with('follows')->get();

        $connectionIds = Connection::where('user_id', $userId)
            ->pluck('user_target')
            ->merge(Connection::where('user_target', $userId)->pluck('user_id'))
            ->unique()
            ->toArray();

        $users = User::where('user_id', '!=', $userId)
            ->where('user_id', '!=', Auth::user()->user_id)
            ->whereNotIn('user_id', $connectionIds)
            ->with('userEducations')
            ->get();

        $user = User::with('about', 'userLanguages', 'userEducations.company', 'skills.education', 'certificates',
                            'experiences', 'posts', 'follows', 'companyRoles', 'interested')
                    ->where('user_id', $userId)
                    ->firstOrFail();

        $user->userEducations = $user->userEducations->sortByDesc('start_date')->values();
        $user->experiences = $user->experiences->sortByDesc('start_date')->values();

        return view('pages.user-profile', compact('user', 'auth', 'ads', 'companies', 'users'));
    }
}
