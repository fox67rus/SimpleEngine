<?php
/**
 * instance of Page class
 */

//**
*$this - это указатель на контроллер, из которого вызван метод render().
Вы же всегда можете посмотреть его var_dump - ом
*/

$m = $this->getModel();

$html = "<h1>Добрый день, ".$m->getUser()->getName() ."</h1>";

//пример вывода данных из массива
/*$modelArray = $m->getArray();

for($i = 0; $i < 10; $i++){
    $html .= "<p>" . $modelArray[$i] . "</p>";
}*/

echo $html;