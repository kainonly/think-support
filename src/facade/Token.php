<?php
declare (strict_types=1);

namespace think\support\facade;

use stdClass;
use think\Facade;
use think\extra\contract\TokenInterface;

/**
 * Class Token
 * @package think\support\facade
 * @method static \Lcobucci\JWT\Token|false create(string $scene, string $jti, string $ack, array $symbol = [])
 * @method static \Lcobucci\JWT\Token get(string $tokenString)
 * @method static stdClass verify(string $scene, string $tokenString)
 */
class Token extends Facade
{
    protected static function getFacadeClass(): string
    {
        return TokenInterface::class;
    }
}