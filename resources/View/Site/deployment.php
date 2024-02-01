<?php

use App\Engine\Helpers\Includer;
// Указываем имя страницы
$titlePage = "Развертывание";
// Доп стиль
$linksStyles = "<link rel='stylesheet' href='style/deployment.css'>";
// Подключение начала шаблона
include Includer::view('/Layout/Start.php');
?>

<div class="deployment container">
    <h1 class="title">
        Развертывание
    </h1>
    <div class="modules">
        <div class="module">
            <h2 class="title-secondary">
                Модули
            </h2>
            <p>На моем устройстве установлен OpenServer и модули подключены из него. Для работы в IDE я настроил интерпрета́тор</p>
            <img class="img-w100p" src="img/deployment/interpreter.png" alt="interpreter">
            <p>Помимо этого php прописан в системных переменных</p>
            <img class="img-wauto" src="img/deployment/path.png" alt="path">
        </div>
        <div class="module     ">
            <h2 class="title-secondary">Запуск</h2>
            <ol>
                <li>
                    <p>
                        Открыть командную строку (можно как из IDE, так и cmd)
                    </p>
                    <div>
                        <img class="img-w100p" src="img/deployment/cmd.png" alt="cmd">
                    </div>
                </li>
                <li>
                    <p>Перейти в директорию public</p>
                    <div>
                        <img src="img/deployment/cd.png" alt="cd public" class="img-w100p">
                    </div>

                </li>
                <li>
                    <p>Запустить php-сервер с помощью команды <i>php -S localhost:8000</i></p>
                    <div>
                        <img src="img/deployment/start.png" alt="start server" class="img-w100p">
                    </div>

                </li>
            </ol>
        </div>

    </div>
</div>

<?php
// Допольнительный скрипт
$linksScripts ="";
// Подключение конца шаблона
include Includer::view('/Layout/End.php');
?>