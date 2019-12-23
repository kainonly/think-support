<?php

namespace think\support\facade;

use think\extra\contract\HashInterface;
use think\Facade;

/**
 * Class Hash
 * @package think\support\facade
 * @method static false|string create(string $password, array $options = [])
 * @method static bool check(string $password, string $hashPassword)
 */
class Hash extends Facade
{
    protected static function getFacadeClass()
    {
        return HashInterface::class;
    }
}