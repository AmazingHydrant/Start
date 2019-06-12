<?php
$default_controller = 'User';
define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
$controllerName = CONTROLLER . 'Controller';
$default_action = 'dumpUserTable';
$action = isset($_GET['a']) ? $_GET['a'] : $default_action;
define('FILE_PATH', __DIR__ . "/classes/{$controllerName}.class.php");
if (file_exists(FILE_PATH)) {
    require_once(FILE_PATH);
    $userC = new $controllerName;
    $userC->$action();
}
