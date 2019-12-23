<?php

namespace think\support\facade;

use think\extra\contract\TokenInterface;
use think\Facade;

/**
 * Class Token
 * @package think\support\facade
 * @method static \Lcobucci\JWT\Token|false create(string $scene, string $jti, string $ack, array $symbol = [])
 * @method static \Lcobucci\JWT\Token get(string $tokenString)
 * @method static \stdClass verify(string $scene, string $tokenString)
 */
class Token extends Facade
{
    protected static function getFacadeClass()
    {
        return TokenInterface::class;
    }
}