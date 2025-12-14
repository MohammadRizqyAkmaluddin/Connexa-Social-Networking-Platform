<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Carbon::macro('shortDiff', function () {
            $now = now();

            if ($this->diffInSeconds($now) < 60) {
                return (int) $this->diffInSeconds($now) . 's';
            }

            if ($this->diffInMinutes($now) < 60) {
                return (int) $this->diffInMinutes($now) . 'm';
            }

            if ($this->diffInHours($now) < 24) {
                return (int) $this->diffInHours($now) . 'h';
            }

            if ($this->diffInDays($now) < 30) {
                return (int) $this->diffInDays($now) . 'd';
            }

            if ($this->diffInMonths($now) < 12) {
                return (int) $this->diffInMonths($now) . ' mo';
            }

            return (int) $this->diffInYears($now) . ' y';
        });
    }
}

