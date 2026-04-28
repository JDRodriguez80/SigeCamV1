<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class ViewServiceProvider extends ServiceProvider
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
        // Usamos un View Composer para pasar el logo a las vistas principales.
        // Se usa caché para no consultar la base de datos en cada petición.
        View::composer(['template.template', 'template.sidebar'], function ($view) {
            $logo = Cache::remember('system_logo', 60, function () {
                return Setting::where('key', 'logo')->value('value');
            });
            $view->with('systemLogo', $logo);
        });
    }
}
