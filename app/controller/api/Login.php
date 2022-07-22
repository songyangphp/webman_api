<?php


namespace app\controller\api;


use app\model\User;
use support\Request;
use support\Response;
use think\facade\Db;

class Login extends Api
{
    public function login(Request $request)
    {
        $username = $request->post('username');
        if(!$username) Response::apiError("请输入账号");
        $password = $request->post('password');
        if(!$password) Response::apiError("请输入密码");

        $do_login = User::login($username,$password);
        if(!$do_login){
            return Response::apiError("账号或密码错误");
        }

        return Response::apiSuccess(['token' => $do_login]);
    }

    public function userInfo(Request $request)
    {
        $uid = $this->uid();
        $map = [];
        $map['id'] = $uid;
        $user_info = Db::name("user")->where($map)->find();
        return json($user_info);
    }
}