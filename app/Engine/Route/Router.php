<?php

namespace App\Engine\Route;

class Router
{
    // Статичный массив get-маршрутов
    private static $getRoutes = [];

    // Статичный массив post-маршрутов
    private static $postRoutes = [];

    // Метод для получения get-маршрутов
    public static function getRoutesGet()
    {
        // Возвращаем массив через self, из-за статичности
        return self::$getRoutes;
    }

    // Метод для получения get-маршрутов
    public static function getRoutesPost()
    {
        // Возвращаем массив через self, из-за статичности
        return self::$postRoutes;
    }

    // Метод для добавления маршрута в массив get
    public static function get(string $route, array $config)
    {
        // Создание маршурта через конструктор класса, (name, [controller, action]), строка и массив конфигурции
        $newRoute = new Route($route, $config[0], $config[1]);
        // Добавляем во внутренний массив
        self::$getRoutes[] = $newRoute;
    }

    // Метод для добавления маршрута в массив post
    public static function post(string $route, array $config)
    {
        // Создание маршурта через конструктор класса, (name, [controller, action]), строка и массив конфигурции
        $newRoute = new Route($route, $config[0], $config[1]);
        // Добавляем во внутренний массив
        self::$postRoutes[] = $newRoute;
    }

    // Метод для создания регулярного выражения
    public static function createRegex(Route $route)
    {
        // Исходнпя строка полученная из конфигуарцяии маршрута, дополнительно удалены / в начале и конце
        $regexSource = trim($route->route, '/');
        // Получаем массив из исходной строки стандраным explode по /
        $regexSourceArray = explode('/', $regexSource);

        // Перебираем циклом массив
        foreach ($regexSourceArray as $paramKey => $value){
            // Если есть совпадение по ругелярному выражению
            if(preg_match('/^{.*}$/', $value)){
                // То мы заменяем это занчение по сооветствующему ключу
                // на выржание которое в себя принимает что угодно + не ругается на get-параметры
                $regexSourceArray[$paramKey]='(\w+)(\?.*)?';
            }
        }
        // Создаем регярное выражение, экранируем только /, дополниетльно делаем строку из массива с сепаратором /
        $regex = str_replace('/','\/',implode('/', $regexSourceArray));
        // Возвращаем регулярное выражение, дополнительно обернув
        return '/^' . $regex . '$/';
    }

    // Метод для переслки, принимающий в себя uri, куда нужно выполнить персылку
    public static function redirect(string $uri)
    {
        // В зоговок передаем uri, далее произойдет пересылка
        header("Location: $uri");
    }












}