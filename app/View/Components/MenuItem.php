<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Route;

class MenuItem extends Component
{
    /**
     * The route name or URL for the menu item.
     *
     * @var string
     */
    public $route;

    /**
     * The icon classes for the menu item.
     *
     * @var string
     */
    public $icon;

    /**
     * The localization key for the menu label.
     *
     * @var string
     */
    public $label;

    /**
     * The array of route patterns that mark this menu as active.
     *
     * @var array
     */
    public $activeRoutes;

    /**
     * Indicates if the menu item has a submenu.
     *
     * @var bool
     */
    public $hasSubmenu;

    /**
     * The submenu items.
     *
     * @var array|null
     */
    public $submenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route = '#', $icon = 'bx bx-circle', $label = '', $activeRoutes = [], $submenu = null)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
        $this->activeRoutes = $activeRoutes;
        $this->submenu = $submenu;
        $this->hasSubmenu = is_array($submenu) && count($submenu) > 0;
    }

    /**
     * Determine if the menu item is active.
     *
     * @return bool
     */
    public function isActive()
    {
        foreach ($this->activeRoutes as $activeRoute) {
            if (Route::currentRouteNamed($activeRoute)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}

