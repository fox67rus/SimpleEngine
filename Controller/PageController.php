<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 15:32
 */

namespace SimpleEngine\Controller;

use SimpleEngine\Model\User;
use SimpleEngine\Model\Page;

class PageController extends BasicController
{
    public function __construct()
    {
        $this->model = new Page();
    }

    public function actionIndex(){
        echo $this->render("index");
    }

    public function getModelName()
    {
        return "Page";
    }
}