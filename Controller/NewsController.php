<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 15:31
 */

namespace SimpleEngine\Controller;


class NewsController extends BasicController
{
    public function actionIndex(){
        echo $this->render("index");
    }

    public function getModelName()
    {
        return "News";
    }
}