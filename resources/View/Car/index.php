<?php

use App\Engine\Helpers\Includer;
    // Название страницы
    $titlePage = "Турнирная таблица";
    // Указание дополнительных стилений
    $linksStyles = "<link rel='stylesheet' href='style/tournamentPage.css'>";
    // Подключние верха шаблона
    include Includer::view('/Layout/Start.php');
    // Далее верстка
?>

    <div class="tournament container">
        <h1 class="title">Турнирная таблица</h1>
        <div>
            Число заездов - <b><?= $maxCountAttempts ?></b>
        </div>
        <div class="tournament-table__wrapper">
            <table class="tournament-table" id="tournament-table">
                <thead>
                <tr>
                    <th>
                        Регистрационный номер участника
                    </th>
                    <th>
                        Имя участника
                    </th>
                    <th>
                        Город
                    </th>
                    <th>
                        Автомобиль
                    </th>
                    <?php
                    // Циксл на вывод заедов до максимального
                    for ($i = 1; $i <= $maxCountAttempts; $i++){
                        ?>
                        <th class="sorting">
                            <?= "Заезд $i" ?>
                        </th>
                        <?php
                    }
                    ?>
                    <th class="sorting sorted">
                        Итог
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Вывод учтников
                foreach ($cars as $car){
                    ?>
                    <tr>
                        <td>
                            <?= $car->id ?>
                        </td>
                        <td>
                            <?= $car->name ?>
                        </td>
                        <td>
                            <?= $car->city ?>
                        </td>
                        <td>
                            <?= $car->car ?>
                        </td>
                        <?php
                        // Финальный счет
                        $finalCount = 0;

                        // Если количество заездов равно максимльному, простой вывод и добавление
                        if(count($car->attempts)==$maxCountAttempts){
                            // Цикл на вывод
                            foreach ($car->attempts as $attempt){
                                // К счету добавляем результат заезда
                                $finalCount+=$attempt->result;
                                // Вывод ячейки
                                echo "<td>$attempt->result</td>";
                            }
                        // Если не совпадает
                        }else{
                            // Цикл на вывод вплоть до максимального числа заездов
                            for($i=0; $i<$maxCountAttempts; $i++){
                                // Если есть элемент в массиве заедов на текущий шаг цикла
                                if(isset($car->attempts[$i])){
                                    // Прибавляем результат заезда
                                    $finalCount+=$car->attempts[$i]->result;
                                    // Выводим заезд
                                    echo "<td>".$car->attempts[$i]->result."</td>";
                                }
                                // Если коняились элементы
                                else{
                                    // К счету прибавляем ноль
                                    $finalCount+=0;
                                    // Выводим отсутсвие
                                    echo "<td>0 - Нет данных</td>";
                                }
                            }
                        }
                        // Вывод финального счета учатсника
                        echo "<td>$finalCount</td>";
                        ?>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    // Допольтельный скрипт
    $linksScripts = "<script src='script/sortTableScript.js'></script>";
    // Подключем конец шаблона
    include Includer::view('/Layout/End.php');
?>