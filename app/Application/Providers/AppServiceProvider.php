<?php

namespace App\Application\Providers;

use App\Application\ViewComposers\AdminModuleComposer;
use App\Framework\Services\Module\ModuleService;
use App\Framework\Services\Module\ModuleServiceInterface;
use App\Framework\Services\Module\Panel;
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

        // Push module list into admin sidebar template
        View::composer(
            'admin.layout.app', AdminModuleComposer::class
        );

        // Push currently used module panel name into every admin template
        View::composer('admin.*', function ($view) {
            $panel = app(ModuleServiceInterface::class)
                ->panels()
                ->first(fn(Panel $panel) => request()->routeIs($panel->getRoute()));

            if ($panel) {
                $view->with('panelName', $panel->getTitle());
            }
        });
    }
}
