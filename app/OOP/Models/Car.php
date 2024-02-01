<?php

namespace App\OOP\Models;

class Car extends Model
{
    // Поля класса
    public int $id;
    public string $name;
    public string $city;
    public string $car;

    // Массив попыток
    public array $attempts;

    // Конструктор созданный через alt+ins
    /**
     * @param int $id
     * @param string $name
     * @param string $city
     * @param string $car
     * @param array $attemts
     */
    public function __construct(int $id, string $name, string $city, string $car, array $attempts)
    {
        $this->id = $id;
        $this->name = $name;
        $this->city = $city;
        $this->car = $car;
        $this->attempts = $attempts;
    }

}