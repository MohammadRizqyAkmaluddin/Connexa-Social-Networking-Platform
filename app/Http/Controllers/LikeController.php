<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,post_id'
        ]);

        $userID = Auth::id();
        $postID = $request->post_id;

        $existingLike = Like::where('user_id', $userID)
                            ->where('post_id', $postID)
                            ->first();
        if($existingLike) {
             Like::where('user_id', $userID)
                 ->where('post_id', $postID)
                 ->delete();

    $message = 'Successfully unliked';
        } else {
            Like::create([
                'user_id' => $userID,
                'post_id' => $postID
            ]);
            $message = 'Successfully Liked';
        }
        return redirect()->back()->with('success', $message);
    }
    
}
