<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileViewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'user_target' => 'required|exists:users,user_id'
        ]);

        ProfileView::create([

        ]);
    }
}
