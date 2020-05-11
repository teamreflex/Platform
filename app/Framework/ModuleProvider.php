<?php

namespace App\Framework;

use App\Framework\Services\Module\Module;
use App\Framework\Services\Module\ModuleServiceInterface;
use App\Framework\Services\Module\Panel;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    protected string $modulePath;

    /**
     * Bootstrap application services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        if (isset($this->modulePath)) {
            $this->registerModule($this->modulePath);
        }
    }

    /**
     * Register a module with the framework.
     *
     * @param string $path
     * @throws BindingResolutionException
     * @return Module
     */
    protected function registerModule(string $path): Module
    {
        $module = $this->build(require($path));

        $this->registerPackage($module);

        /* @var $service ModuleServiceInterface */
        $service = $this->app->make(ModuleServiceInterface::class);
        $service->register($module);
        $this->app->instance(ModuleServiceInterface::class, $service);

        return $module;
    }

    /**
     * Build the module object from config.
     *
     * @param array $options
     * @return Module
     */
    protected function build(array $options): Module
    {
        [
            'name' => $name,
            'routes' => $routes,
            'views' => $views,
            'panels' => $panels,
        ] = $options;
        ['path' => $viewPath, 'namespace' => $viewNamespace] = $views;

        return Module::make()
            ->setName($name)
            ->setRoutes($routes)
            ->setViews($viewPath)
            ->setNamespace($viewNamespace)
            ->setPanels($this->buildPanels($panels));
    }

    /**
     * Register standard Laravel related config.
     *
     * @param Module $module
     */
    protected function registerPackage(Module $module): void
    {
        if ($routes = $module->getRoutes()) {
            $this->loadRoutesFrom($routes);
        }

        if (($views = $module->getViews()) && ($namespace = $module->getNamespace())) {
            $this->loadViewsFrom($views, $namespace);
            $this->publishes([
               $views => resource_path("views/vendor/{$namespace}"),
            ]);
        }
    }

    /**
     * Build panel config into objects.
     *
     * @param array $panels
     * @return array
     */
    protected function buildPanels(array $panels): array
    {
        return Collection::make($panels)
            ->map(function (array $panel) {
                ['title' => $title, 'route' => $route, 'icon' => $icon] = $panel;
                return Panel::make()
                    ->setTitle($title)
                    ->setRoute($route)
                    ->setIcon($icon);
            })->all();
    }
}
