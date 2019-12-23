<?php

namespace think\support\facade;

use think\Facade;

/**
 * Class Oss
 * @method static string put(string $name)
 * @package think\support\facade
 */
class Oss extends Facade
{
    protected static function getFacadeClass()
    {
        return 'oss';
    }
}