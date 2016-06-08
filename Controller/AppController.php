<?php

/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 10:31
 */
namespace SimpleEngine\Controller;

use SimpleEngine\Model\User;

class AppController
{
    private static $instance;

    protected $called_controller = 'index';
    protected $called_action = 'index';
    protected $generator;

    protected function __construct()
    {
        // path_data = controller/action
        $path_data = explode("/", RequestController::_get('path', 's'));

        // default path data = page/index
        $this->called_controller = "SimpleEngine\\Controller\\".(!empty($path_data[0]) ? ucfirst($path_data[0]) : "Page")."Controller";
        $this->called_action = (!empty($path_data[1]) ? $path_data[1] : "index");
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function run(){
        // by default : new SimpleEngine\Controller\PageController();
        $this->generator = new $this->called_controller();
        // by default : actionIndex
        // actionUpdate <- update
        $method = 'action'.ucfirst($this->called_action);

        $this->generator->$method();
    }
}