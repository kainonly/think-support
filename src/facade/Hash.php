<?php

namespace think\support\facade;

use think\Facade;

/**
 * Class Hash
 * @package think\support\facade
 * @method static false|string create(string $password, array $options = [])
 * @method static boolean check(string $password, string $hashPassword)
 */
final class Hash extends Facade
{
    protected static function getFacadeClass()
    {
        return 'hash';
    }
}