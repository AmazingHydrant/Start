<?php
class UserModel extends Model
{
    /**
     * @param string $userName
     * @param string $passWord
     */
    public function addUser($userName, $passWord)
    {
        $passWord = MD5($passWord);
        $sql = "insert into users (user, pass) values ('{$userName}','{$passWord}')";
        return $this->dao->myQuery($sql);
    }
    public function getUserList()
    {
        $sql = 'select * from users';
        return $this->dao->fetchAll($sql);
    }
}
