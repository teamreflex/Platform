<?php

namespace App\Framework\Services\Module;

use Illuminate\Support\Collection;

class ModuleService implements ModuleServiceInterface
{
    protected Collection $modules;

    /**
     * ModuleService constructor.
     */
    public function __construct()
    {
        $this->modules = new Collection();
    }

    /**
     * @inheritDoc
     */
    public function register(Module $module): bool
    {
        return $this->modules->push($module)->contains($module);
    }

    /**
     * @inheritDoc
     */
    public function loaded(): Collection
    {
        return $this->modules;
    }

    /**
     * @inheritDoc
     */
    public function panels(): Collection
    {
        return $this->loaded()->flatMap(fn(Module $module) => $module->getPanels());
    }
}
