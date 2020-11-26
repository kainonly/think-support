<?php
declare (strict_types=1);

namespace think\support\facade;

use Lcobucci\JWT\Token\Plain;
use stdClass;
use think\Facade;
use think\extra\contract\TokenInterface;

/**
 * Class Token
 * @package think\support\facade
 * @method static Plain create(string $scene, string $jti, string $ack, array $symbol = []) 生成令牌
 * @method static Plain get(string $jwt) 获取令牌对象
 * @method static stdClass verify(string $scene, string $jwt) 验证令牌
 */
class Token extends Facade
{
    protected static function getFacadeClass(): string
    {
        return TokenInterface::class;
    }
}