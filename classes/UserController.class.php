<?php
class UserController
{
    /**
     * 
     */
    public function __construct()
    {
        $this->autoLoad();
    }
    private function autoLoad()
    {
        function autoLoad($class)
        {
            require_once("/classes/{$class}.class.php");
        }
        spl_autoload_register('autoLoad');
    }
    public function dumpUserTable()
    {
        $userModel = new UserModel;
        $res = $userModel->getUserList();
        require_once('/View/home.php');
    }
}
