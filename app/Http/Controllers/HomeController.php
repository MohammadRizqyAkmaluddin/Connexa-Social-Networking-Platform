<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Company;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $educations = $user->userEducations()->with('company')->get();

        $posts = Post::with(['user', 'comments.user', 'likes.user', 'postImages'])
            ->inRandomOrder()
            ->get();

        $companies = Company::limit(3)->inRandomOrder()->get();

        $peoples = User::limit(2)->inRandomOrder()->get();

        return view('pages.homepage', compact('user', 'educations', 'posts', 'companies', 'peoples'));
    }
}
