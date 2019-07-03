<?php
/**
 * 單例對象工廠
 */
class Factory
{
    /**
     * 生產單例對象
     * @param object $className
     * @return object
     */
    public static function getObj($className)
    {
        static $objList = [];
        $file = "./{$className}.class.php";
        if (!isset($objList[$className])) {
            require_once($file);
            $objList[$className] = new $className;
        }
        return $objList[$className];
    }
}
