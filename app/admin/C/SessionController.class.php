<?php
class SessionController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        $this->initSession();
        $this->checkSession();
    }
    /**
     * initSession
     */
    protected function initSession()
    {
        session_start();
    }
    protected function checkSession()
    {
        if (!isset($_SESSION["user"])) {
            $this->jump('admin', 'admin', 'index');
            die;
        }
    }
}
