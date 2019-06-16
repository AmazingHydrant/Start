<?php
class UserController extends Controller
{
    public function dumpUserTable()
    {
        $userModel = new UserModel;
        $res = $userModel->getUserList();
        require_once(PLATFORM_V . 'home.php');
    }
}
