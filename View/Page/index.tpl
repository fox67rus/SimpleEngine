<?php
/**
 * instance of Page class
 */
//$m = $this->getModel();
$m = \SimpleEngine\Controller\PageController::getModel();

$html = "<h1>Добрый день, ".$m->getUser()->getName() ."</h1>";

$modelArray = $m->getModel()->getArray();


for($i = 0; $i < 10; $i++){
    $html .= "<p>" . $modelArray[$i] . "</p>";
}

echo $html;