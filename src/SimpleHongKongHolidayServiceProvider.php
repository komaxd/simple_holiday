<?php

namespace Koma\SimpleHongKongHoliday;

use Illuminate\Support\ServiceProvider;
use Koma\SimpleHongKongHoliday\app\Console\Commands\FetchHolidays;

class SimpleHongKongHolidayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/simple_holiday.php', 'simple_holiday'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchHolidays::class,
            ]);
        }

        //publishing files
        //configs
        $this->publishes([
            __DIR__ . '/config/simple_holiday.php' => config_path('simple_holiday.php')
        ], 'simple-holiday-config');
        //migrations
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'simple-holiday-migrations');
    }
}
