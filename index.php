<?php

    // FRONT CONTROLLER

    // 1. Общие настройки
    // 1. Settings
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    // 2. Подключение файлов системы
    // 2. Include system files
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Router.php');

    // 3. Соединение с БД
    // 3. Connection to DB
    include_once ROOT.'/components/Db.php';
    include_once ROOT.'/libraries/DBStarter.php';

    // Create Tables Into DB for first Start
    (new DBStarter)->start();

    // 4. Вызов роутера
    // 4. Call Router
    $router = new Router();
    $router->run();