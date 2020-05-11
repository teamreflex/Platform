<?php

namespace App\Framework\Services\Module;

class Panel
{
    public string $title;
    public string $route;
    public string $icon;

    /**
     * Factory method.
     * @return Panel
     */
    public static function make(): Panel
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Panel
     */
    public function setTitle(string $title): Panel
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return Panel
     */
    public function setRoute(string $route): Panel
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Panel
     */
    public function setIcon(string $icon): Panel
    {
        $this->icon = $icon;
        return $this;
    }
}
