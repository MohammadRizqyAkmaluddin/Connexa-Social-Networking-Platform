<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,post_id',
            'comment' => 'required|string|max:1000'
        ]);
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comments succesfully added');
    }
}
