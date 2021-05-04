<?php

namespace MISHAJIB\Settings;

use Illuminate\Support\ServiceProvider;
use MISHAJIB\Settings\Console\Commands\SettingCreateCommand;
use MISHAJIB\Settings\Console\Commands\SettingForgetCommand;
use MISHAJIB\Settings\Console\Commands\SettingUpdateCommand;
use MISHAJIB\Settings\Console\Commands\ShowAllSettingUpdateCommand;

class SettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                ShowAllSettingUpdateCommand::class,
                SettingCreateCommand::class,
                SettingForgetCommand::class,
                SettingUpdateCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('settings', function () {
            return new LaravelSettingsFacade();
        });
    }
}
