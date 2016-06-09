<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 15:50
 */

namespace SimpleEngine\Model;


class Page
{
    protected $user;

    function __construct()
    {
        $this->user = new User();
    }

    public function getUser(){
        return $this->user;
    }

    //тестовый метод для организации сбора каких либо данных в массив для дальнейшего вывода на экран
    public function getArray(){
        $s="1";
        return $s;
    }
}