<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 15:57
 */

namespace SimpleEngine\Controller;


abstract class BasicController
{
    protected $model;
    protected $action;
    
    public function getModel(){
        return $this->model;
    }

    public abstract function getModelName();

    protected function render($method = "index", $ajax = false){
        if(!$ajax){
            $head = $_SERVER['DOCUMENT_ROOT'] . '/SimpleEngine/View/Header.html';
            $foot = $_SERVER['DOCUMENT_ROOT'] . '/SimpleEngine/View/Footer.html';

            require_once $head;
            $out = '';

            if(file_exists($tpl = $_SERVER['DOCUMENT_ROOT'] . '/SimpleEngine/View/' . $this->getModelName() . '/' . $method . '.tpl')){// создаём буфер вывода
                ob_start();
                // подключаем шаблон
                include_once ($tpl);
                // собрали буфер вывода в переменную
                $out = ob_get_contents();
                // очистили буфер
                ob_end_clean();
            }else{
                $out = '404 :: Can\'t find '.$this->getModelName() .' '.$method;
            }

            require_once $foot;

            // возвращаем сгенерированную страницу
            return $out;
        }
        else{
            return json_encode($this->data['answer']);
        }
    }
}