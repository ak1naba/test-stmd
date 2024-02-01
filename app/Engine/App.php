<?php

namespace App\Engine;

use App\Engine\Route\Router;

class App
{
    public static function run()
    {
        // Получаем имя метода, который будет отдавать пути соответсвующие текущему типу запроса
        $requestMethod = 'getRoutes'.ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        // Получаем uri текузего запроса, удаляем / при помощи trim
        $requestUri = trim($_SERVER['REQUEST_URI'],'/');

        // Переменная ответственная за показ 404 страницы
        $finder = false;

        // Перебираем циклом массив путей, который был получен от роутера
        foreach (Router::$requestMethod() as $route) {
            // Вызываем метод который сделает из маршрута регулярное выражение
            $pattern = Router::createRegex($route);
            // Проверим есть ли совпадение с регулряным выраженим и текущим запросом
            if(preg_match($pattern, $requestUri)){
                // Присвомм переменной отвественной за нахождение страницы true
                $finder=true;

                // Массив параметров для действия
                $paramsArray= [];
                // Создадим массив из регулярки с помошью explode, на элемент \/,
                // предварительно слева и справа уберем символы отвечающие за "регулярность"
                $patternArray = explode('\/', ltrim(rtrim($pattern,'$/'),'/^'));
                // Создадим массив конфигурации маршрута, анлогисным способом предыдущему
                $routeArray = explode('/', trim($route->route,'/'));
                // Созадим массив из текущего uri
                $requestArray = explode('/', $requestUri);

                // Циклом переберм элементы всех трех массивов, можно брать в качестве предела длину любого массива,
                // проверка на совпадение уже пройдена, результат не изменится
                for ($i=0; $i< count($patternArray); $i++){
                    // Проверка, если ежлемнт массива регуряного выражения равен (\w+)(\?.*)?, тогла запустим следующую проверку
                    if($patternArray[$i]=='(\w+)(\?.*)?'){
                        // Если элемнт массива текущего uri удовлетворяет руглярному выржению, тогда выполняем дейтсвие
                        if(preg_match("/^$patternArray[$i]$/",$requestArray[$i])){
                            // В массив параметров добавлем элемент по ключу полеченному из массива конфигурации,
                            // предвартиельно убираем {}, и присваиваем значение текущего uti
                            $paramsArray[trim($routeArray[$i], '{}')] = $requestArray[$i];
                        }
                    }
                }
                // Получаем имя контроллера из концигурации
                $controllerClass = $route->controller;
                // Создаем экземпляр класса по полученному имени
                $controller = new $controllerClass();

                // Проверяем, существует ли метод экшена в контроллере
                $actionMethod = $route->action;
                if (method_exists($controller, $actionMethod)) {
                    // Вызываем метод экшена и передаем параметры, дополнительно распаковываем параметры
                    print $controller->$actionMethod(...$paramsArray);
                } else {
                    // Обработка ошибки свзянной с отсуствием метода
                    echo "404: Action not found";
                }
                // Остнавливаем цикл
                break;
            }
        }
        // Если нужной страницы не нашлось
        if (!$finder){
            // Выполняем пересылку на 404 страницу
            Router::redirect('/404');
        }
    }
}