<?php

namespace App\Engine\View;

class Viewer
{
    // Статичный метод, который принимает в себя путь и данные
    public static function view(string $path, ?array $data)
    {
        // Создаем экземпляр класса через конструктор
        $view = new View($path, $data);

        // Заменяем public на resources/View/ в document_root
        $documentStart = str_replace('public','resources/View/', $_SERVER['DOCUMENT_ROOT']);
        // Переназначаем путь в объекте, дополинтельно заменяем . на / и добавляем расширение файла
        $view->path = $documentStart.str_replace('.','/',$view->path).'.php';

        // Если у нас data не пуста
        if ($view->data !== null) {
            // То распаковываем данные из объкта
            extract($view->data);
        }

        // Запускаем кеширование
        ob_start();
        // Подключаем файл предстваления
        include $view->path;
        // Сохраняем кеш в перменную
        $html = ob_get_contents();
        // Заканчиваем кеширование и чистим кеш
        ob_end_clean();

        // Возвращаем кеш
        return $html;

    }
}