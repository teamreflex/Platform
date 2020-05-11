<?php

namespace App\Application\ViewComposers;

use App\Framework\Services\Module\ModuleServiceInterface;
use Illuminate\View\View;

class AdminModuleComposer
{
    protected ModuleServiceInterface $modules;

    /**
     * AdminModuleComposer constructor.
     * @param ModuleServiceInterface $modules
     */
    public function __construct(ModuleServiceInterface $modules)
    {
        $this->modules = $modules;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('modules', $this->modules->loaded());
    }
}
