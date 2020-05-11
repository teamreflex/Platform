<?php

namespace App\Framework\Services\Module;

use Illuminate\Support\Collection;

class Module
{
    public string $name;
    public ?string $routes = null;
    public ?string $views = null;
    public ?string $namespace = null;
    public array $panels = [];

    /**
     * Factory method.
     * @return Module
     */
    public static function make(): Module
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Module
     */
    public function setName(string $name): Module
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoutes(): ?string
    {
        return $this->routes;
    }

    /**
     * @param string|null $routes
     * @return Module
     */
    public function setRoutes(?string $routes): Module
    {
        $this->routes = $routes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getViews(): ?string
    {
        return $this->views;
    }

    /**
     * @param string|null $views
     * @return Module
     */
    public function setViews(?string $views): Module
    {
        $this->views = $views;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * @param string|null $namespace
     * @return Module
     */
    public function setNamespace(?string $namespace): Module
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getPanels(): Collection
    {
        return new Collection($this->panels);
    }

    /**
     * @param array $panels
     * @return Module
     */
    public function setPanels(array $panels): Module
    {
        $this->panels = $panels;
        return $this;
    }
}
