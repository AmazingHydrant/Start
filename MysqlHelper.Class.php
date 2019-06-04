<?php
header("charset=utf-8");
/**
 * MysqlDB工具
 */
class MysqlHelper
{

    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $charset;
    private $mySQLi;
    private static $instance = null;
    /**
     * 
     * @param array $option
     */
    private function __construct($option)
    {
        $this->dbInit($option);
        $this->dbConnect();
        $this->dbCharset();
    }
    /**
     * DB參數初始化
     * @param array $option
     * 
     */
    private function dbInit($option)
    {
        $this->host = isset($option['host']) ?  $option['host'] : '127.0.0.1';
        $this->user = isset($option['user']) ?  $option['user'] : 'root';
        $this->pass = isset($option['pass']) ?  $option['pass'] : null;
        $this->dbname = isset($option['dbname']) ?  $option['dbname'] : null;
        $this->charset = isset($option['charset']) ?  $option['charset'] : 'utf8';
        if (!($this->host && $this->user && $this->pass && $this->dbname)) {
            die("DB初始化參數不完整！");
        }
    }
    /**
     * 連接DB
     */
    private function dbConnect()
    {
        $this->mySQLi = @new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->mySQLi->connect_error) {
            die($this->mySQLi->connect_error);
        }
    }
    /**
     * 設定字符編碼
     * 
     */
    private function dbCharset()
    {
        $res = $this->mySQLi->set_charset($this->charset);
        if (!$res) {
            die("無效的字符編碼：{$this->charset}");
        }
    }
    /**
     * 單例模式
     * @param array $option
     * default arr['host'=>'127.0.0.1', 'user'=>'root', 'pass'=>'null', 'dbname'=>'null', 'charset'=>'utf8']
     */
    public static function getSingleton($option)
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self($option);
        }
        return self::$instance;
    }
    public function __destruct()
    {
        if (self::$instance) {
            $this->mySQLi->close();
        }
    }
}
