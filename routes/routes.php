<?php

use App\Engine\Route\Router;
use App\OOP\Controllers\CarController;
use App\OOP\Controllers\SiteController;

// Создание маршрута аналогичное тому, что используется в Laravel
Router::get('/', [CarController::class, 'index']);
Router::get('/deployment', [SiteController::class, 'deployment']);
Router::get('/readme.md', [SiteController::class, 'readme']);
Router::get('/404', [SiteController::class, 'notFound']);


