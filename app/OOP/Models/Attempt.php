<?php

namespace App\OOP\Models;

class Attempt extends Model
{
    // Поля класса
    public int $id;
    public float $result;

    // Конструктор созданный через alt+ins
    /**
     * @param int $id
     * @param float $result
     */
    public function __construct(int $id, float $result)
    {
        $this->id = $id;
        $this->result = $result;
    }
}