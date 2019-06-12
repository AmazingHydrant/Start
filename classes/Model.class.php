<?php
class Model
{
    /**
     * @var MysqlHelper
     */
    protected $dao;
    public function __construct()
    {
        $this->initDAO();
    }
    private function initDAO()
    {
        $option = [
            'pass' => '!@#123qwe',
            'dbname' => 'website'
        ];
        $this->dao = MysqlHelper::getSingleton($option);
    }
}
