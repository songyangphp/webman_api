<?php

namespace app\model;

use think\facade\Db;

class UserToken
{
    public static function checkToken($token)
    {
        $uid = self::getField($token);
        return $uid === false ? false : $uid;
    }

    public static function getField($token)
    {
        $old_user = Db::name("user_token")->where('token',$token)->find();
        if(!$old_user){
            return false;
        }
        $last_token = Db::name("user_token")->where("uid",$old_user['uid'])->order("token_id desc")->value('token');
        if($token != $last_token){
            return false;
        }

        return $old_user['uid'];
    }

    public static function createToken($uid)
    {
        $token = md5(time().$uid.rand(1000,9999));
        $ins_token = Db::name("user_token")->insertGetId([
            "uid" => $uid,
            "token" => $token,
            "request_time" => date("Y-m-d H:i:s"),
            "request_ip" => request()->getRealIp()
        ]);
        if($ins_token){
            return $token;
        }
        return false;
    }
}