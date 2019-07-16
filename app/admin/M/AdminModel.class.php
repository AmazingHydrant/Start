<?php
class AdminModel extends PDODB
{
    /**
     * check username & password
     * @param string $user
     * @param string $pass
     */
    public function check($user, $pass)
    {
        if ($user != '' and $pass != '') {
            $res = $this->fetchRow("select user from users where user = ? and pass = ?", [$user, md5($pass)]);
            return $res;
        }
        return false;
    }
}
