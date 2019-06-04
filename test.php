<?php

require_once('./MysqlHelper.Class.php');
$option = [
    'pass' => '!@#123qwe',
    'dbname' => 'login',
];
$mys = MysqlHelper::getSingleton($option);
