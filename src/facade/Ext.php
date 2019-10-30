<?php

namespace think\support\facade;

use Ramsey\Uuid\UuidInterface;
use Stringy\Stringy;
use think\Facade;

/**
 * Class Str
 * @package think\support\facade
 * @method static Stringy stringy($str = '', $encoding = null)
 * @method static UuidInterface uuid()
 */
final class Ext extends Facade
{
    protected static function getFacadeClass()
    {
        return 'ext';
    }
}