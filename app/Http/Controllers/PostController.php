<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostImage;

class PostController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'post_type' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
 
        $post = new Post();
        $post->post_type = $request->post_type;
        $post->user_id = Auth::user()->user_id;
        $post->description = $request->description;
        $post->save();

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('IMG/uploads/post'), $fileName);

                PostImage::create ([
                    'post_id' => $post->post_id,
                    'image' => $fileName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Successfully Create Post');
    }
}
