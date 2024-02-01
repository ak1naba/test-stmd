<?php

namespace App\Engine\View;

class View
{
    // Путь к файлу
    public string $path;
    // Массив с данными, который может быть пустым
    public ?array $data;


    // Конструктор класса созданный через alt+ins
    /**
     * @param string $path
     * @param array|null $data
     */
    public function __construct(string $path, ?array $data)
    {
        $this->path = $path;
        $this->data = $data;
    }
}