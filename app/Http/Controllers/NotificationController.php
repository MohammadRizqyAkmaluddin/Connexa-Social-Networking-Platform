<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $educations = $user->userEducations()->with('company')->get();

        $ads = Ads::limit(1)->inRandomOrder()->get();

        $notifications = Notification::with('user', 'applicant', 'sender')
                ->where('user_id', $user->user_id)
                ->get();

        $countNotification = Notification::where('status', 'New')
                ->where('user_id', $user->user_id)
                ->count();

        return view('pages.notification', compact('user','ads','notifications', 'countNotification'));
    }
}
