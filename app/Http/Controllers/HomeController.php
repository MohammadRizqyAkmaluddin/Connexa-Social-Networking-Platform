<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
       $user = Auth::user();

        // relasi pendidikan
        $educations = $user->userEducations()->with('company')->get();

        // ambil semua postingan random dengan relasi lengkap
        $posts = Post::with(['user', 'comments.user', 'likes.user'])
            ->inRandomOrder()
            ->get();

        // kirim semua data ke view
        return view('pages.homepage', compact('user', 'educations', 'posts'));
    }
}
