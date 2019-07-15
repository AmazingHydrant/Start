<?php
class AdminModel extends DBCommonModel
{
    /**
     * check username & password
     * @param string $user
     * @param string $pass
     */
    public function check($user, $pass)
    {
        $res = $this->pdo->fetchRow("select user from users where user = ? and pass = ?", [$user, md5($pass)]);
        return $res;
    }
}
