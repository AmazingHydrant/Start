<?php
function autoLoad($className)
{
    $frameClassList = [
        'Controller' => FRAME_DIR . 'Controller.class.php',
        'Model' => FRAME_DIR . 'Model.class.php',
        'Factory' => FRAME_DIR . 'Factory.class.php',
        'MysqlHelper' => FRAME_DIR . 'MysqlHelper.class.php',
    ];
    if (isset($frameClassList[$className])) {
        require_once($frameClassList[$className]);
    } elseif (substr($className, -10) == 'Controller') {
        require_once(PLATFORM_C . "{$className}.class.php");
    } elseif (substr($className, -5) == 'Model') {
        require_once(PLATFORM_M . "{$className}.class.php");
    }
}
spl_autoload_register('autoLoad');
define('ROOT_DIR', '/');
define('APP_DIR', ROOT_DIR . 'App/');
define('FRAME_DIR', ROOT_DIR . 'Frame/');
//default platform
$default_platform = 'dev';
//exists plaform dir
define('PLATFORM', isset($_GET['p']) && is_dir(APP_DIR . $_GET['p']) ? $_GET['p'] : $default_platform);
//MVC dir in platform
define('PLATFORM_M', APP_DIR . PLATFORM . '/Model/');
define('PLATFORM_V', APP_DIR . PLATFORM . '/View/');
define('PLATFORM_C', APP_DIR . PLATFORM . '/Controller/');
//default controller
$default_controller = 'User';
//exists class.php file
define('CONTROLLER', isset($_GET['c']) && file_exists(PLATFORM_C . $_GET['c'] . '.class.php')  ? $_GET['c'] : $default_controller);
$controllerName = CONTROLLER . 'Controller';
//default action
$default_action = 'dumpUserTable';
$userC = new $controllerName;
//exists class method
$action = isset($_GET['a']) && method_exists($userC, $_GET['a']) ? $_GET['a'] : $default_action;
$userC->$action();
