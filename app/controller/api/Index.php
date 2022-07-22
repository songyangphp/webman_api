<?php

namespace app\controller\api;

use support\Request;
use support\Response;
use think\facade\Db;

class Index
{
    public function index(Request $request)
    {
        //示例
        $user_list = Db::name("user")->select();
        return Response::apiSuccess($user_list);
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }
}
