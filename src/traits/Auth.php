<?php
declare (strict_types=1);

namespace think\support\traits;

use Exception;
use Lcobucci\JWT\Token\Plain;
use think\facade\Cookie;
use think\helper\Str;
use think\redis\library\RefreshToken;
use think\support\facade\Token;

trait Auth
{
    /**
     * 创建授权令牌
     * @param string $scene
     * @param array $symbol
     * @return array
     * @throws Exception
     */
    protected function create(string $scene, array $symbol = []): array
    {
        $jti = uuid()->toString();
        $ack = Str::random();
        $result = RefreshToken::create()->factory($jti, $ack, 3600);
        if (!$result) {
            return [
                'error' => 1,
                'msg' => 'refresh token set failed'
            ];
        }
        $token = Token::create($scene, $jti, $ack, $symbol);
        Cookie::set($scene . '_token', $token->toString());
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }


    /**
     * 验证授权令牌
     * @param string $scene
     * @return array
     */
    protected function authVerify(string $scene): array
    {
        if (!Cookie::has($scene . '_token')) {
            return [
                'error' => 1,
                'msg' => 'refresh token not exists'
            ];
        }
        $tokenString = Cookie::get($scene . '_token');
        $result = Token::verify($scene, $tokenString);
        assert($result->token instanceof Plain);
        $token = $result->token;
        $claims = $token->claims();
        $jti = $claims->get('jti');
        $ack = $claims->get('ack');
        $symbol = $claims->get('symbol');
        if ($result->expired === true) {
            if (!RefreshToken::create()->verify($jti, $ack)) {
                return [
                    'error' => 1,
                    'msg' => 'refresh token verification expired'
                ];
            }
            $newToken = Token::create($scene, $jti, $ack, $symbol);
            Cookie::set($scene . '_token', $newToken->toString());
        }
        RefreshToken::create()->renewal($jti, 3600);
        return $this->authHook($symbol);
    }

    /**
     * Auth Hook
     * @param array $symbol
     * @return array
     */
    protected function authHook(array $symbol): array
    {
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }

    /**
     * Destory Auth
     * @param string $scene
     * @return array
     */
    protected function destory(string $scene): array
    {
        if (Cookie::has($scene . '_token')) {
            $tokenString = Cookie::get($scene . '_token');
            $token = Token::get($tokenString);
            $claims = $token->claims();
            RefreshToken::create()->clear(
                $claims->get('jti'),
                $claims->get('ack')
            );
            Cookie::delete($scene . '_token');
        }
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }
}