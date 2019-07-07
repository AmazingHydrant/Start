<?php
class ManagerController extends SessionController
{
    /**
     * manager indxe page
     */
    public function index()
    {
        $custM = new CustModel;
        $page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 1;
        self::$var = $custM->getCustInfo($page);
        $paginationM = new PaginationModel;
        $total = $custM->totalNun();
        $url = 'http://www.start.com/index.php?p=admin&c=Manager&a=index&page=';
        $GLOBALS['pagination'] = $paginationM->getPagination($url, $total, $page);
        $this->display('home.php');
    }
    /**
     * logout
     */
    public function logout()
    {
        unset($_SESSION['user']);
    }
    /**
     * fetch cust info
     * @param int $id cusr id
     */
    public function fetchInfo()
    {
        if (isset($_POST['id'])) {
            $custM = new CustModel;
            $info = $custM->fetch($_GET['id']);
            return $info;
        }
        return false;
    }
    public function test()
    {
        $custM = new CustModel;
        $custM->totalNun();
    }
}
