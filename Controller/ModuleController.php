<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 10:44
 */

namespace SimpleEngine\Controller;


class ModuleController
{
    protected $rootPath; // путь до проекта
    protected $className;

    function __construct($className)
    {
        $this->className = $className;
        $this->rootPath = $_SERVER['DOCUMENT_ROOT'];
    }

    public function load()
    {
        $file = null;

        /* Возвращает массив строк, полученных разбиением строки имени класса с использованием "\\" в качестве разделителя. */
        $tmp_path_array = explode("\\", $this->className);

        var_dump($tmp_path_array);

        $vendor = $tmp_path_array[0]; //"SimpleEngine"
        $type = $tmp_path_array[1]; // "Controller"
        $class = $tmp_path_array[2]; //"AppController"

        if($vendor == APP_VENDOR && file_exists( $_SERVER['DOCUMENT_ROOT'] . "/" . $vendor. "/" .$type. "/" . $class . '.php' )) {
            // calling controller
            $file = $_SERVER['DOCUMENT_ROOT'] . "/" . $vendor . "/" . $type . "/" . $class . '.php';
			
            require_once $file;
        }
        else {
            throw new \Exception("Can't load " . $_SERVER['DOCUMENT_ROOT'] . "/" . $vendor . "/" . $type . "/" . $class . '.php');
        }
    }
}