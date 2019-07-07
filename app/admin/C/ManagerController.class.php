<?php
class ManagerController extends SessionController
{
    /**
     * manager indxe page
     */
    public function index()
    {
        $custM = new CustModel;
        $total = $custM->totalNun();
        $totalPage = ceil($total / 10);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $totalPage) {
            $page = $totalPage;
        }
        $GLOBALS['custInfo'] = $custM->getCustInfo($page);
        $paginationM = new PaginationModel;
        $url = 'http://www.start.com/index.php?p=admin&c=Manager&a=index&page=';
        $GLOBALS['pagination'] = $paginationM->getPagination($url, $total, $page);
        $GLOBALS['totalPage'] = $totalPage;
        $GLOBALS['page'] = $page;
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
