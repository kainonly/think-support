<?php
declare (strict_types=1);

namespace think\support\facade;

use think\extra\contract\UtilsInterface;
use think\extra\utils\Jump;
use think\Facade;

/**
 * Class Utils
 * @package think\support\facade
 * @method  static Jump jump(string $msg, string $url = '', string $type = 'html')
 */
class Utils extends Facade
{
    protected static function getFacadeClass(): string
    {
        return UtilsInterface::class;
    }
}