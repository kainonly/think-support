<?php
declare (strict_types=1);

namespace think\support\traits;

use Exception;
use think\facade\Cookie;
use think\helper\Str;
use think\redis\library\RefreshToken;
use think\support\facade\Token;

trait Auth
{
    /**
     * Set RefreshToken Expires
     * @return int
     */
    protected function refreshTokenExpires(): int
    {
        return 604800;
    }

    /**
     * Create Cookie Auth
     * @param string $scene
     * @param array $symbol
     * @return array
     * @throws Exception
     */
    protected function create(string $scene, array $symbol = []): array
    {
        $jti = uuid()->toString();
        $ack = Str::random();
        $result = RefreshToken::create()->factory($jti, $ack, $this->refreshTokenExpires());
        if (!$result) {
            return [
                'error' => 1,
                'msg' => 'refresh token set failed'
            ];
        }

        $tokenString = (string)Token::create($scene, $jti, $ack, $symbol);
        if (!$tokenString) {
            return [
                'error' => 1,
                'msg' => 'create token failed'
            ];
        }
        Cookie::set($scene . '_token', $tokenString);
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }


    /**
     * Auth Verify
     * @param string $scene
     * @return array
     */
    protected function authVerify(string $scene): array
    {
        try {
            if (!Cookie::has($scene . '_token')) {
                return [
                    'error' => 1,
                    'msg' => 'refresh token not exists'
                ];
            }

            $tokenString = Cookie::get($scene . '_token');
            $result = Token::verify($scene, $tokenString);
            /**
             * @var $token \Lcobucci\JWT\Token
             */
            $token = $result->token;
            $symbol = (array)$token->getClaim('symbol');
            if ($result->expired) {
                $jti = $token->getClaim('jti');
                $ack = $token->getClaim('ack');
                $verify = RefreshToken::create()->verify($jti, $ack);
                if (!$verify) {
                    return [
                        'error' => 1,
                        'msg' => 'refresh token verification expired'
                    ];
                }
                $preTokenString = (string)Token::create(
                    $scene,
                    $jti,
                    $ack,
                    $symbol
                );
                if (!$preTokenString) {
                    return [
                        'error' => 1,
                        'msg' => 'create token failed'
                    ];
                }
                Cookie::set($scene . '_token', $preTokenString);
            }

            return $this->authHook($symbol);
        } catch (Exception $e) {
            return [
                'error' => 1,
                'msg' => $e->getMessage()
            ];
        }
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
            RefreshToken::create()->clear(
                $token->getClaim('jti'),
                $token->getClaim('ack')
            );
            Cookie::delete($scene . '_token');
        }
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }
}