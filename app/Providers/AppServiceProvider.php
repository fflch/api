<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;

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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Sanctum::authenticateAccessTokensUsing(
            static function (PersonalAccessToken $accessToken, bool $is_valid) {

                if ($accessToken->revoked == 1) {
                    return false;
                }

                $deactivation = $accessToken->tokenable->deactivation_date;

                if (Carbon::now('GMT-3') > $deactivation && $deactivation !== null) {
                    $accessToken->revoked = 1;
                    $accessToken->save();
                    return false;
                };

                return $is_valid;
            }
        );
    }
}
