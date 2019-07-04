<?php
class CustModel
{
    /**
     * @var PDODB $pdo
     */
    private $pdo;
    public function __construct()
    {
        $this->initPDO();
    }
    private function initPDO()
    {
        $this->pdo = PDODB::getInstance(['pass' => '!@#123qwe', 'dbname' => 'start']);
    }
    public function getCustInfo($page = 1)
    {
        $info = $this->pdo->fetchAll("select * from custs limit " . (string) ($page - 1) * 10 . ", 10", []);
        return $info;
    }
}
