<?php


namespace app\controller\api;


use Webman\Route;

class Api
{
    protected static $uid = 0;

    public static function setUid($uid)
    {
        self::$uid = (int)$uid;
    }

    /**
     * 控制器中获取当前登录用户的 uid
     * @return int
     */
    public function uid() : int
    {
        return self::$uid;
    }
}