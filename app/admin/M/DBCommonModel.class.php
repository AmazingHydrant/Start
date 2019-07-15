<?php
class DBCommonModel
{
    /**
     * @var PDODB $pdodb
     */
    protected $pdo;
    /**
     * init PDODB
     */
    public function __construct()
    {
        $this->initPDODB();
    }
    /**
     * init params new PDODB
     */
    private function initPDODB()
    {
        $option = [
            'pass' => '!@#123qwe',
            'dbname' => 'start'
        ];
        $this->pdo = PDODB::getInstance($option);
    }
}
