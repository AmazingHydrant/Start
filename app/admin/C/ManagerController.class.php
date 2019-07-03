<?php
class ManagerController extends SessionController
{
    /**
     * manager indxe page
     */
    public function index()
    {
        $this->display('home.php');
    }
    /**
     * logout
     */
    public function logout()
    {
        unset($_SESSION['user']);
    }
}
