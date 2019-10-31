<?php

declare (strict_types=1);

namespace think\support\middleware;

use think\facade\Cookie;
use think\redis\library\RefreshToken;
use think\Request;
use think\support\facade\Context;
use think\support\facade\Token;

/**
 * 授权认证验证中间件
 * Class JsonResponse
 * @package think\bit\middleware
 */
abstract class AuthVerify
{
    /**
     * 场景
     * @var string
     */
    protected $scene = 'default';

    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed|\think\response\Json
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            if (!Cookie::has($this->scene . '_token')) {
                return json([
                    'error' => 1,
                    'msg' => 'please first authorize user login'
                ], 401);
            }

            $tokenString = Cookie::get($this->scene . '_token');
            $result = Token::verify($this->scene, $tokenString);
            /**
             * @var $token \Lcobucci\JWT\Token
             */
            $token = $result->token;
            $symbol = $token->getClaim('symbol');
            if ($result->expired) {
                $jti = $token->getClaim('jti');
                $ack = $token->getClaim('ack');
                $verify = RefreshToken::create()->verify($jti, $ack);
                if (!$verify) {
                    return json([
                        'error' => 1,
                        'msg' => 'refresh token verification expired'
                    ], 401);
                }
                $preTokenString = (string)Token::create(
                    $this->scene,
                    $jti,
                    $ack,
                    (array)$symbol
                );
                if (empty($preTokenString)) {
                    return json([
                        'error' => 1,
                        'msg' => 'create token failed'
                    ]);
                }
                Cookie::set($this->scene . '_token', $preTokenString);
            }
            Context::set('auth', $symbol);
            return $next($request);
        } catch (\Exception $e) {
            return json([
                'error' => 1,
                'msg' => $e->getMessage()
            ], 400);
        }
    }
}