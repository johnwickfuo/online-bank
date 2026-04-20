<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;
use Illuminate\Support\Facades\View;
use App\Models\Settings;
use App\Models\SettingsCont;
use App\Models\TermsPrivacy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage as FacadesStorage;
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
        FacadesStorage::extend('sftp', function ($app, $config) {
            return new Filesystem(new SftpAdapter($config));
        });

        Paginator::useBootstrap();

        // Sharing settings with all view
        $settings = Settings::where('id', '1')->first();
        $terms =  TermsPrivacy::find(1);
        $moreset =  SettingsCont::find(1);

        View::share('settings', $settings);
        View::share('terms', $terms);
        View::share('moresettings', $moreset);
        View::share('mod', $settings->modules);
        View::share('currencies', config('currencies'));

        // Inject per-user currency symbol/code into all user-facing views.
        // Falls back to the global settings currency when the user has not set a preference.
        View::composer('user.*', function ($view) use ($settings) {
            if (auth()->check()) {
                $user = auth()->user();
                $currencies = config('currencies');
                $code   = $user->currency ?: $settings->s_currency;
                $symbol = $currencies[$code]['symbol'] ?? $settings->currency;
            } else {
                $code   = $settings->s_currency;
                $symbol = $settings->currency;
            }
            $view->with('userCurrencyCode', $code);
            $view->with('userCurrencySymbol', $symbol);
        });
    }
}