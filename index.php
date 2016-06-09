<?php

// change the following paths if necessary
//echo 'Текущая версия PHP: ' . phpversion();

//формируем путь до файла настроек
$config = $_SERVER['DOCUMENT_ROOT'] . '/SimpleEngine/config/main_cnfg.php';

//подключаем файл настроек
require_once $config;


//создаем экземпляр приложения с помощью синглтон
$app = \SimpleEngine\Controller\AppController::getInstance()->run();

