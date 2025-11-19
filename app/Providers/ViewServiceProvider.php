<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // ← ini yang benar
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('components.navbar-main', function ($view) {

            $user = Auth::user();

            $companies = $user
                ? $user->accessCompanies()->with('overviews', 'roles', 'jobs')->get()
                : collect();

            $view->with('companies', $companies);
        });
    }
}
