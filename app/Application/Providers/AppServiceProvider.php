<?php

namespace App\Application\Providers;

use App\Application\ViewComposers\AdminModuleComposer;
use App\Framework\Services\Module\ModuleService;
use App\Framework\Services\Module\ModuleServiceInterface;
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
        $this->app->instance(ModuleServiceInterface::class, new ModuleService());

        View::composer(
            'admin.layout.app', AdminModuleComposer::class
        );
    }
}
