<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <!--Fivicon-->
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <!--Шрифты-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!--Обнуление-->
    <link rel="stylesheet" href="style/default.css">
    <!--Основные стили-->
    <link rel="stylesheet" href="style/main.css">
    <!--Дополнительные стили-->
    <?= $linksStyles ?>
</head>
<body>
    <header>
        <div class="header container">
            <div class="header-logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="header-menu">
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
            </div>
            <div class="header-nav ">
                <a href="/" class="header-link">Главная</a>
                <a href="/deployment" class="header-link">Развертывание</a>
                <a href="/readme.md" class="header-link">Read Me</a>

            </div>
        </div>
    </header>
    <main>


