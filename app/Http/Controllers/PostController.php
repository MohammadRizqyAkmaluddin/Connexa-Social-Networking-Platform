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
            'post_type' => 'required|string'
        ]);
 
        $post = new Post();
        $post->post_type = $request->post_type;
        $post->user_id = Auth::user()->user_id;
        $post->description = $request->description;
        $post->save();

        if ($request->hasFile('images')) {
            $counter = 1;
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();

                $fileName = 'post' . $post->post_id . '.' . $counter . '.' . $extension;

                $image->move(public_path('IMG/uploads/post'), $fileName);

                PostImage::create([
                    'post_id' => $post->post_id,
                    'image' => $fileName
                ]);

                $counter++;
            }
        }


        return redirect()->back()->with('success', 'Successfully Create Post');
    }
}
