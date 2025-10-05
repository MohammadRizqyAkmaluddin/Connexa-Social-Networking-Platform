<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
        'fullname'      => 'required|string|max:255',
        'phone_number'  => 'required|string|max:20',
        'gender'        => 'required|string|max:50',
        'dob_month'     => 'required|integer|min:1|max:12',
        'dob_date'      => 'required|integer|min:1|max:31',
        'email'         => 'required|email|unique:users,email',
        'password'      => 'required|min:6',
        ]);

        $dob = sprintf('2000-%02d-%02d', $request->dob_month, $request->dob_date);

        $lastUser = User::orderBy('user_id', 'desc')->first();
        if ($lastUser) {
            $lastNumber = intval(substr($lastUser->user_id, 1));
            $newId = 'U' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'U001';
        }

        User::create([
            'user_id'       => $newId,
            'name'          => $request->fullname,
            'phone_number'  => $request->phone_number,
            'gender'        => $request->gender,
            'dob'           => $dob,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('register.form')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Invalid credentials provided.',
            ])->withInput();
        }

        Auth::login($user);
        
        return redirect()->route('homepage');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
