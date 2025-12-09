<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AppliedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterestedController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSavedController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecruitmentController;

Route::get('/', function () {
    return view('pages.main');
})->name('main.page');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/homepage', [HomeController::class, 'index'])
    ->name('homepage.page')
    ->middleware('auth');

Route::get('/business', function() {
    return view('pages.business');
})->name('business.page')->middleware('auth');

Route::get('/network', function() {
    return view('pages.network');
})->name('network.page')->middleware('auth');

Route::get('/notification', function() {
    return view('pages.notification');
})->name('notification.page')->middleware('auth');

Route::get('/learning', function() {
    return view('pages.learning');
})->name('learning.page')->middleware('auth');

Route::get('/user/{user_id}', [UserController::class, 'show'])->name('user.page')->middleware();

Route::get('/network', [ConnectionController::class, 'index'])->name('network.page')->middleware();
Route::get('/company/{company_id}', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.page')->middleware('auth');
Route::get('/jobs/{job_id}', [JobController::class, 'show'])->name('job.page')->middleware('auth');
Route::get('/business', [BusinessController::class, 'index'])->name('business.page')->middleware('auth');
Route::get('/message', [MessageController::class, 'index'])->name('message.page')->middleware('auth');
Route::get('/manage/{company_id}', [BusinessController::class, 'show'])->name('manage.show')->middleware('auth');
Route::get('/recruitment/{job_id}', [RecruitmentController::class, 'show'])->name('recruitment.show')->middleware('auth');
Route::get('/application/{job_id}', [AppliedController::class, 'show'])->name('application.show')->middleware('auth');

Route::post('/recruitment/update-progress', [RecruitmentController::class, 'updateApplication'])->name('progress.update');
Route::post('/recruitment/update-reject', [RecruitmentController::class, 'rejectApplication'])->name('reject.update');

Route::post('/message/store', [MessageController::class, 'store'])->name('message.store')->middleware('auth');
Route::post('/message/update-status', [MessageController::class, 'updateStatus'])->name('message.updateStatus')->middleware('auth');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::post('/company/{company_id}/posts', [PostController::class, 'storeCompanyPost'])->name('company.posts.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');
Route::post('/likes', [LikeController::class, 'store'])->name('like.store');
Route::post('/follows', [FollowController::class, 'store'])->name('follow.store');
Route::post('/save', [JobSavedController::class, 'store'])->name('save.store');
Route::post('/interest', [InterestedController::class, 'store'])->name('interest.store');
Route::post('/connections', [ConnectionController::class, 'store'])->name('connect.store');
Route::post('/network/update', [ConnectionController::class, 'update'])->name('connect.update');
Route::post('/network/cancel', [ConnectionController::class, 'cancelRequest'])->name('connect.cancel');
Route::post('/ads', [AdsController::class, 'store'])->name('ads.store');
Route::post('/jobs/store', [JobController::class, 'store'])->name('job.store');
Route::post('/application', [JobController::class, 'applicationStore'])->name('application.store');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

