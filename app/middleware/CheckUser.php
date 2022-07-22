<?php


namespace app\middleware;


use app\controller\api\Api;
use app\model\UserToken;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

class CheckUser implements MiddlewareInterface
{
    /**
     * 不需要登录的路由名称
     * @return string[]
     */
    private function getNoNeedRoutePath()
    {
        return [
            "/api.user.login"
        ];
    }

    /**
     * 请求时候鉴权
     * @param Request $request
     * @param callable $handler
     * @return Response
     */
    public function process(Request $request, callable $handler): Response
    {
        $path = $request->path();
        $uid = 0;
        if(!in_array($path,$this->getNoNeedRoutePath())){
            $token = $request->post("token","");
            $uid = UserToken::checkToken($token);
            if(!$uid){
                return \support\Response::apiError("登录已失效",1002);
            }
        }

        Api::setUid($uid);
        return $handler($request);
    }
}