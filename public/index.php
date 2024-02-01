<?php
// Запуск работы сессий
session_start();

use App\Engine\App;

// Подключение автозагрузки для использования пространства имен
require "../vendor/autoload.php";
// Подключение файла с маршрутами
require '../routes/routes.php';

// Запуск приложения
App::run();