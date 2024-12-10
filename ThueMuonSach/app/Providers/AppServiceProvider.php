<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DanhMuc;
use App\Models\ChiTietHoaDonThue;
use App\Observers\ChiTietHoaDonThueObserver;


use Illuminate\Pagination\Paginator;

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
        //
        Paginator::useBootstrapFive();
        ChiTietHoaDonThue::observe(ChiTietHoaDonThueObserver::class);
        View::composer('*', function ($view) {
            $view->with('dsDanhMuc', DanhMuc::all());
        });
    }
}
