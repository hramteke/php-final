<?php
//router

$tokens = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
//echo '<pre>';
//print_r($_SERVER);
//print_r($tokens);
//echo '</pre>';

$controllerName = ucfirst($tokens[1]);
$methodName = lcfirst($tokens[2]);
$name = $tokens[3];
$age = $tokens[4];
//echo 'Controller Name: '. $controllerName . '<br/>';
//echo 'Method Name: '. $methodName . '<br/>';
$controllerFile = 'controller/'.$controllerName.'.php';
if (file_exists($controllerFile)) {
    /** @noinspection PhpIncludeInspection */
    require_once($controllerFile);
    $controller = new $controllerName;
    $controller->$methodName($name, $age);
}
