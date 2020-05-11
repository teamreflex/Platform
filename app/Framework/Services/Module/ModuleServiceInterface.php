<?php

namespace App\Framework\Services\Module;

use Illuminate\Support\Collection;

interface ModuleServiceInterface
{
    /**
     * Register a module with the framework.
     *
     * @param Module $module
     * @return bool
     */
    public function register(Module $module): bool;

    /**
     * Get all loaded modules.
     *
     * @return Collection
     */
    public function loaded(): Collection;
}
