<?php
class AdminController extends Controller
{
    /**
     * 
     */
    public function __construct()
    {
        // parent::__construct();
        session_start();
    }
    /**
     * login page
     */
    public function login()
    {
        if (isset($_SESSION["user"])) {
            $this->jump('admin', 'Manager', 'index');
        }
        $this->display('login.php');
    }
    /**
     * check username & password
     */
    public function check()
    {
        $adminM = new AdminModel;
        $info = [];
        header('Content-Type: application/json; charset=utf-8');
        if (isset($_POST['user']) && isset($_POST['pass']) && $adminM->check($_POST['user'], $_POST['pass'])) {
            $info['status'] = true;
            $_SESSION["user"] = $_POST['user'];
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }
}
