<?php
class ManagerController extends SessionController
{
    /**
     * manager indxe page
     */
    public function index()
    {
        $total = M('Cust')->totalNun();
        $totalPage = ceil($total / 10);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $totalPage) {
            $page = $totalPage;
        }
        $custInfo = M('Cust')->getCustInfo($page);
        $paginationM = new PaginationModel;
        $url = 'http://www.start.com/index.php?p=admin&c=Manager&a=index&page=';
        $pagination = $paginationM->getPagination($url, $total, $page);
        $this->assign('custInfo', $custInfo);
        $this->assign('pagination', $pagination);
        $this->assign('totalPage', $totalPage);
        $this->assign('page', $page);
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
            $info = M('Cust')->fetch($_GET['id']);
            return $info;
        }
        return false;
    }
    public function test()
    {
        M('Cust')->totalNun();
    }
}
