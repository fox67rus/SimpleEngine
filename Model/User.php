<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 11:08
 */

namespace SimpleEngine\Model;

use SimpleEngine\Controller\DatabaseController;

class User
{
    protected $id;
    protected $name;


    public function __construct($id = null)
    {
        $this->id = 1;
        $this->name = "Имя";
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
}