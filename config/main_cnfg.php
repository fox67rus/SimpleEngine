<?php

//------ VERSION ------

define("APP_VENDOR","SimpleEngine");
define("MIN_PHP_VERSION","5.4");

//------ PHP ------

session_cache_limiter('nocache'); //установить ограничитель кэша 'nocache'
mb_internal_encoding('UTF-8'); // Устанавливает внутреннюю кодировку UTF-8
mb_regex_encoding('UTF-8'); //устанавливает кодировку символов многобайтного regex в UTF-8

if (version_compare(phpversion(), MIN_PHP_VERSION, "<")) //сравнение версии PHP на сервере и минимально доупстимой
{
    /*  генерирует сообщение error/warning/notice пользовательского уровня */
    trigger_error("Current PHP version ".phpversion()." is lower than required ".MIN_PHP_VERSION, E_USER_ERROR);
}

//------ MODULE LOADER ------

//подключаем файл контроллера
require_once $_SERVER['DOCUMENT_ROOT'] . "/SimpleEngine/Controller/ModuleController.php";

/* Регистрирует функцию autoload в качестве реализации метода __autoload() */
spl_autoload_register('autoload');


function autoload($className)
{
    try{
        /* создаем объект с именем $className */
        $ml = new SimpleEngine\Controller\ModuleController($className);
        $ml->load();

    }
    catch (Exception $e) {
        echo 'Поймали исключение<br />';
        echo 'Сообщение: '   . $e->getMessage() . '<br />';
    }
}

//------ SESSION ------

// В сессии могут храниться объекты, поэтому сессия стартуется после установки autoload
session_start();

//------ GET MODULE FILES ------