<?php


namespace app\model;


use think\facade\Db;

class User
{
    public static function login($username, $password)
    {
        $map = [];
        $map['username'] = $username;
        $map['password'] = self::fixPassword($password);
        $user_info = Db::name("user")->where($map)->find();
        if($user_info){
            return UserToken::createToken($user_info['id']);
        }

        return false;
    }

    public static function fixPassword($password) : string
    {
        return md5(md5($password."SONGYANG970828"));
    }
}