<?php
declare (strict_types=1);

namespace think\support\traits;

use think\facade\Cookie;
use think\helper\Str;
use think\redis\library\RefreshToken;
use think\support\facade\Token;
use think\support\facade\Utils;

trait Auth
{
    /**
     * Set RefreshToken Expires
     * @return int
     */
    protected function __refreshTokenExpires(): int
    {
        return 604800;
    }

    /**
     * Create Cookie Auth
     * @param string $scene
     * @param array $symbol
     * @return array
     */
    protected function __create(string $scene, array $symbol = []): array
    {
        $jti = Utils::uuid()->toString();
        $ack = Str::random();
        $result = RefreshToken::create()->factory($jti, $ack, $this->__refreshTokenExpires());
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
    protected function __verify(string $scene): array
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
            if ($result->expired) {
                /**
                 * @var $token \Lcobucci\JWT\Token
                 */
                $token = $result->token;
                $jti = $token->getClaim('jti');
                $ack = $token->getClaim('ack');
                $verify = RefreshToken::create()->verify($jti, $ack);
                if (!$verify) {
                    return [
                        'error' => 1,
                        'msg' => 'refresh token verification expired'
                    ];
                }
                $symbol = (array)$token->getClaim('symbol');
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

            return [
                'error' => 0,
                'msg' => 'ok'
            ];
        } catch (\Exception $e) {
            return [
                'error' => 1,
                'msg' => $e->getMessage()
            ];
        }
    }

    /**
     * Destory Auth
     * @param string $scene
     * @return array
     */
    protected function __destory(string $scene): array
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