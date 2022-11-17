<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Carbon::setLocale(Session()->get('applocale'));
        PaginationPaginator::useBootstrap();
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Baku');

        $settings = Setting::find(1);

        $menus1 = Menu::where('status', 1)->where('parent_id', 1)->orderBy('order_number', 'asc')->get();
        $menus2 = Menu::where('status', 1)->where('parent_id', 2)->orderBy('order_number', 'asc')->get();
        $menus3 = Menu::where('status', 1)->where('parent_id', 3)->orderBy('order_number', 'asc')->get();
        $menus4 = Menu::where('status', 1)->where('parent_id', 4)->orderBy('order_number', 'asc')->get();
        $lang = app()->getLocale();

        View::share(['lang'=> $lang, 'settings' => $settings, 'menus1' => $menus1, 'menus2' => $menus2, 'menus3' => $menus3, 'menus4' => $menus4]);
    }
}

