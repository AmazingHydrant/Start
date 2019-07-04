<?php
class ManagerController extends SessionController
{
    /**
     * manager indxe page
     */
    public function index()
    {
        $custM = new CustModel;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        self::$var = $custM->getCustInfo($page);
        $this->display('home.php');
    }
    /**
     * logout
     */
    public function logout()
    {
        unset($_SESSION['user']);
    }
    public function test()
    {
        $custM = new CustModel;
        $custM->getCustInfo();
    }
}
