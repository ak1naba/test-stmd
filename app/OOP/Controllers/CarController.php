<?php

namespace App\OOP\Controllers;

use App\Engine\View\Viewer;
use App\OOP\Models\Car;


class CarController extends Controller
{
    // Метод для получения и сортировки данных о заездах
    public function index()
    {
        // Получаем данные из файла с помощью дополнительного метода
        $carsData = $this->rider("source/data_cars.json");
        // Создаем новый экхемпляр контроллера
        $attemptObject = new AttemptController();
        // Вызываем метод, который вернут даныные о заездах
        $attemptsData = $attemptObject->index();

        // Массив под участников
        $cars = [];

        // Цикл для перебора учатсников
        foreach ($carsData as $carObject){
            // Временный массив под заезды
            $tempArrayAttempt = [];
            // Цикл для перебора заездов
            foreach ($attemptsData as $attempt){
                // Если id заезда равен id участника
                if($attempt->id==$carObject['id']){
                    // Добавляем во времнный массив попытку
                    $tempArrayAttempt[] = $attempt;
                }
            }

            // Создаем новый экземпляр класса участника и передаем в конструктор данные
            $newCar = new Car(
                $carObject['id'],
                $carObject['name'],
                $carObject['city'],
                $carObject['car'],
                $tempArrayAttempt
            );
            // Добавляем в массив объект
            $cars[]=$newCar;
        }
        // Дополнительно получаем данные о максимальном количестве заездов. Для этого используется дополнительная ффункция
        $maxCountAttempts = $this->getMaxCountAttempts($cars);

        // Сортировак массива с помощью самописной функции, которая принимает в себя 2 парамтера
        usort($cars, function($a, $b) {
            // Получаем сумму по столбцу result вложенного массива
            $sumA = array_sum(array_column($a->attempts, 'result'));
            $sumB = array_sum(array_column($b->attempts, 'result'));

            // так как нужно сделать обратную сортировку так, что вычитаем из второго первое
            return $sumB - $sumA;
        });

        // Возвращаем предстваление с двумя параметрами. Массив и количество заездов
        return Viewer::view('Car.index', compact('cars','maxCountAttempts'));
    }

    // Метод для получения максимального числа заездов, принимает в себя массив
    public function getMaxCountAttempts($cars)
    {
        // Начальное занчение будет равно длине массива первого учтаника
        $maxCountAttempts = count($cars[0]->attempts);
        // Циклом пепербираем участников
        foreach ($cars as $car){
            // Если у участника больше заездов чем у первого
            if(count($car->attempts)>$maxCountAttempts){
                // Присваиваем значени длины массива
                $maxCountAttempts = count($car->attempts);
            }
        }
        // Возвращем максимльное число заездов
        return $maxCountAttempts;
    }
    // Метод для чтения данных из файла, принимает в себя строку пути к файлу
    public function rider(string $pathToFile)
    {
        // Полученим данны из файла
        $carsSource = file_get_contents($pathToFile);
        // Возвращаем ассоцитивный массив, полученный из json формата
        return json_decode($carsSource, true);
    }

}