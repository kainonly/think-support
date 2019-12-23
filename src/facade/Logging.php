<?php

namespace think\support\facade;

use think\Facade;

/**
 * Class Logging
 * @package think\support
 * @method static void push($namespace, array $raws = []) 信息收集推送
 */
class Logging extends Facade
{
    protected static function getFacadeClass()
    {
        return 'logging';
    }
}
