<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('pages.main');
})->name('main.page');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route::get('/homepage', function() {
//     $suggestedUsers = User::where('user_id', '!=', Auth::id())->get();

//     return view('pages.homepage', [
//         'suggestedUsers' => $suggestedUsers
//     ]);
// })->name('homepage.page')->middleware('auth');

Route::get('/homepage', [HomeController::class, 'index'])
    ->name('homepage.page')
    ->middleware('auth');

Route::get('/jobs', function() {
    return view('pages.jobs');
})->name('jobs.page')->middleware('auth');

Route::get('/business', function() {
    return view('pages.business');
})->name('business.page')->middleware('auth');

Route::get('/message', function() {
    return view('pages.message');
})->name('message.page')->middleware('auth');

Route::get('/network', function() {
    return view('pages.network');
})->name('network.page')->middleware('auth');

Route::get('/notification', function() {
    return view('pages.notification');
})->name('notification.page')->middleware('auth');

Route::get('/learning', function() {
    return view('pages.learning');
})->name('learning.page')->middleware('auth');


// Route::get('/homepage', [HomeController::class, 'index'])
//     ->name('homepage.page')
//     ->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

