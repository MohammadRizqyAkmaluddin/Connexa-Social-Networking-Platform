<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Ads;
use App\Models\Connection;
use App\Models\Company;

class ExploreController extends Controller
{

    public function search(Request $request)
    {
        $q = $request->q;
        $authUserId = Auth::user()->user_id;

        // --- POSTS SEARCH ---
        $posts = Post::with(['user', 'company', 'comments.user', 'likes.user', 'postImages'])
            ->where(function ($query) use ($q) {
                $query->where('description', 'LIKE', "%{$q}%")

                    ->orWhereHas('user', function ($user) use ($q) {
                        $user->where('name', 'LIKE', "%{$q}%");
                    })

                    ->orWhereHas('company', function ($company) use ($q) {
                        $company->where('name', 'LIKE', "%{$q}%");
                    });
            })
            ->latest()
            ->get();

        $authConnections = Connection::where('status', 'Success')
            ->where(function ($q) use ($authUserId) {
                $q->where('user_id', $authUserId)
                ->orWhere('user_target', $authUserId);
            })
            ->get()
            ->map(fn ($c) =>
                $c->user_id == $authUserId ? $c->user_target : $c->user_id
            );

        // ================= USERS =================
        $users = User::where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%{$q}%")
                    ->orWhere('headline', 'LIKE', "%{$q}%");
            })
            ->where('user_id', '!=', $authUserId) // jangan tampilkan diri sendiri
            ->get()
            ->map(function ($user) use ($authConnections) {

                $userConnections = Connection::where('status', 'Success')
                    ->where(function ($q) use ($user) {
                        $q->where('user_id', $user->user_id)
                        ->orWhere('user_target', $user->user_id);
                    })
                    ->get()
                    ->map(fn ($c) =>
                        $c->user_id == $user->user_id ? $c->user_target : $c->user_id
                    );

                $mutualIds = $authConnections->intersect($userConnections);

                // inject data ke object user
                $user->mutual_connections = User::whereIn('user_id', $mutualIds)->get();
                $user->mutual_count = $mutualIds->count();

                return $user;
            })
            ->sortByDesc('mutual_count')
            ->values();

        $otherUsers = User::where('user_id', '!=', $authUserId) // jangan tampilkan diri sendiri
            ->get()
            ->map(function ($user) use ($authConnections) {

                $userConnections = Connection::where('status', 'Success')
                    ->where(function ($q) use ($user) {
                        $q->where('user_id', $user->user_id)
                        ->orWhere('user_target', $user->user_id);
                    })
                    ->get()
                    ->map(fn ($c) =>
                        $c->user_id == $user->user_id ? $c->user_target : $c->user_id
                    );

                $mutualIds = $authConnections->intersect($userConnections);

                // inject data ke object user
                $user->mutual_connections = User::whereIn('user_id', $mutualIds)->get();
                $user->mutual_count = $mutualIds->count();

                return $user;
            })
            ->sortByDesc('mutual_count')
            ->values();

        // --- COMPANIES SEARCH ---
        $companies = Company::where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%{$q}%")
                    ->orWhere('tagline', 'LIKE', "%{$q}%")
                    ->orWhere('industry', 'LIKE', "%{$q}%")
                    ->orWhere('sector', 'LIKE', "%{$q}%");
            })
            ->get();

        $otherCompanies = Company::all();

        $ads = Ads::limit(1)->inRandomOrder()->get();

        return view('pages.explore', compact('posts', 'users', 'otherUsers','companies', 'otherCompanies', 'q', 'ads'));
    }
}
