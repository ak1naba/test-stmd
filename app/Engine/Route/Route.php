<?php

namespace App\Engine\Route;

class Route
{
    // Поля класса, аналагично Laravel
    public string $route;
    public string $controller;
    public string $action;


    // Конструктор класса, сделан через alt+ins PhpStorm
    /**
     * @param string $route
     * @param string $controller
     * @param string $action
     */
    public function __construct(string $route, string $controller, string $action)
    {
        $this->route = $route;
        $this->controller = $controller;
        $this->action = $action;
    }
}