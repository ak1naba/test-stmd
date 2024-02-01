<?php

namespace App\Engine\Helpers;

class Includer
{
    // Метод для преобразования пути от public к реальному пути, он статичный, то есть не нужен отдельный экземпляр класса
    public static function view(string $pathToFile)
    {
        // Заменям в document_root public на resources/View, используем конкатенацию и добавляем путь к файлу
        $path = str_replace('public','resources/View',$_SERVER['DOCUMENT_ROOT']).$pathToFile;
        // Возвразаем путь
        return $path;
    }
}