<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ads;
use App\Models\Company;
use App\Models\Connection;
use App\Models\ProfileView;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $authId = $auth->user_id;

        if ($auth->user_id !== $userId) {
            ProfileView::firstOrCreate([
                    'user_id'     => $auth->user_id,
                    'user_target' => $userId
                ]);
        }

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

        $connection = Connection::with('user', 'target')
            ->where('user_id', $userId)
            ->where('status', 'Success')
            ->orWhere('user_target', $userId)
            ->where('status', 'Success')
            ->get();

        return view('pages.user-profile', compact('user', 'auth', 'ads', 'companies', 'users', 'authId', 'connection'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // validasi
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'headline'  => 'nullable|string|max:255',
            'gender'    => 'required|in:Male,Female',
            'dob_month' => 'required|integer|min:1|max:12',
            'dob_date'  => 'required|integer|min:1|max:31',
            'country'   => 'required|string|max:100',
            'city'      => 'required|string|max:100',
        ]);

        // 🔒 tahun dikunci 2000
        $dob = Carbon::createFromDate(
            2000,
            $validated['dob_month'],
            $validated['dob_date']
        )->format('Y-m-d');

        // update user
        $user->update([
            'name'     => $validated['name'],
            'headline' => $validated['headline'],
            'gender'   => $validated['gender'],
            'dob'      => $dob,
            'country'  => $validated['country'],
            'city'     => $validated['city'],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }

}
