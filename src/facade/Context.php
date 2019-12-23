<?php

namespace think\support\facade;

use think\extra\contract\ContextInterface;
use think\Facade;

/**
 * Class Context
 * @package think\support\facade
 * @method static void set(string $abstract, mixed $value)
 * @method static mixed get(string $abstract)
 */
class Context extends Facade
{
    protected static function getFacadeClass()
    {
        return ContextInterface::class;
    }
}