<?php

namespace App\Providers;

use App\Models\Navs;
use App\Models\WebSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $top_navs = Navs::GetTopNavs()->get();
        $sub_navs = Navs::GetSubNavs()->get();
        $disksPath = config('filesystems.disks.admin.url').'/';
        $webInfo = WebSet::find(1);
        View::share([
            'disksPath' => $disksPath,
            'webInfo' => $webInfo,
            'top_navs' => $top_navs,
            'sub_navs' => $sub_navs,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
