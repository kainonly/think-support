<?php

namespace think\support\facade;

use Lcobucci\JWT\Token;
use think\Facade;

/**
 * Class Jwt
 * @package think\support\facade
 * @method static Token getToken(string $token = null)
 * @method static bool|string setToken(string $scene, array $symbol = [])
 * @method static bool|string verify(string $scene, string $token)
 */
final class Jwt extends Facade
{
    protected static function getFacadeClass()
    {
        return 'jwt';
    }
}