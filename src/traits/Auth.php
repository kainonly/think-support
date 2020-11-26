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
        $token = Token::create($scene, $jti, $ack, $symbol);
        Cookie::set($scene . '_token', $token->toString());
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
            assert($result->token instanceof Plain);
            $token = $result->token;
            $claims = $token->claims();
            $symbol = (array)$claims->get('symbol');
            if ($result->expired === true) {
                $jti = $claims->get('jti');
                $ack = $claims->get('ack');
                $verify = RefreshToken::create()->verify($jti, $ack);
                if (!$verify) {
                    return [
                        'error' => 1,
                        'msg' => 'refresh token verification expired'
                    ];
                }
                $newToken = Token::create($scene, $jti, $ack, $symbol);
                Cookie::set($scene . '_token', $newToken->toString());
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