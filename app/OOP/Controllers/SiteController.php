<?php

namespace App\OOP\Controllers;

use App\Engine\Route\Router;
use App\Engine\View\Viewer;
use App\OOP\Controllers\Controller;

class SiteController extends Controller
{
    // Метод возразает страницу 404
    public function notFound()
    {
        // Образаемся к viewer, передаем путь к шаблоеу и данны, в данном случае ничего
        return Viewer::view('Site.404', null);
    }
    // Метод возращает страницу с развертыванием
    public function deployment()
    {
        // Образаемся к viewer, передаем путь к шаблоеу и данны, в данном случае ничего
        return Viewer::view('Site.deployment', null);
    }
    // Метод возращает страницу с развертыванием
    public function readme()
    {
        // Образаемся к viewer, передаем путь к шаблоеу и данны, в данном случае ничего
        return Viewer::view('Site.readme', null);
    }

    public function testGetParams($param1, $param2)
    {
        echo $param1;
        echo $param2;

        echo "<pre>";
        echo var_dump($_GET);
        echo "</pre>";
    }
}