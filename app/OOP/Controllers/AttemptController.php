<?php

namespace App\OOP\Controllers;

use App\OOP\Models\Attempt;


class AttemptController extends Controller
{
    // Метод для получения данных о заездах
    public function index()
    {
        // Получаем данные из файла с помощью дополнительного метода
        $attemptData = $this->rider();
        // Массив под заезды
        $attempts = [];

        // Перебираем массив с помощью цикла
        foreach ($attemptData as $attempt){
            // Создаем новый экземпляр, через конструктор
            $newAttempt = new Attempt(
                $attempt['id'],
                $attempt['result'],
            );
            // Добавляем в массив
            $attempts[]=$newAttempt;
        }
        // Возвращаем массив
        return $attempts;
    }
    // Метод для чтения данных из файла, принимает в себя строку пути к файлу
    public function rider()
    {
        // Полученим данны из файла
        $attemptSource = file_get_contents('source/data_attempts.json');
        // Возвращаем ассоцитивный массив, полученный из json формата
        return json_decode($attemptSource, true);
    }
}