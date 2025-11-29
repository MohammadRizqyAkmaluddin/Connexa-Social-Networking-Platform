<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::with('userEducations')->get();

        return view('pages.suggestion', compact('users'));
    }
}
