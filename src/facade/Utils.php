<?php

namespace think\support\facade;

use Ramsey\Uuid\UuidInterface;
use Stringy\Stringy;
use think\extra\contract\UtilsInterface;
use think\Facade;

/**
 * Class Utils
 * @package think\support\facade
 * @method static Stringy stringy($str = '', string $encoding = null)
 * @method static UuidInterface uuid()
 */
class Utils extends Facade
{
    protected static function getFacadeClass()
    {
        return UtilsInterface::class;
    }
}