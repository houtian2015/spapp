<?php
namespace App\Api\V1\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\AuthRequest;

class AuthenticateController extends BaseController
{
    /**
     * 登录接口.验证登录并返回登录token
     *
     * @api {post} /user/login
     *
     * @param AuthRequest $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function authenticate(AuthRequest $request)
    {
        // 提取验证字段
        $credentials = $request->only('email', 'password');

        try {
            // 校验登录邮箱与密码是否一致
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized(trans('auth.failed'));
            }
        } catch (JWTException $e) {
            // 出错情况下，返回500错误
            return $this->response->errorInternal('token创建失败');
        }

        // all good so return the token
        return $this->response->item();
    }
}