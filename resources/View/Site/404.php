<?php

use App\Engine\Helpers\Includer;
// Указываем имя страницы
$titlePage = "Страница не найдена";
// Доп стиль
$linksStyles = "<link rel='stylesheet' href='style/404.css'>";
// Подключение начала шаблона
include Includer::view('/Layout/Start.php');
?>

    <div class="not-found container">
        <h1 class="not-found__title">
            404
        </h1>
        <p>
            Страница не найдена, вы можете вернутся на <a href="/" class="link-text">Главную</a> страницу.
        </p>
    </div>

<?php
// Допольнительный скрипт
$linksScripts = "";
// Подключение конца шаблона
include Includer::view('/Layout/End.php');
?>