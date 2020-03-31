<?php

namespace think\support\facade;

use Obs\ObsClient;
use think\Facade;


/**
 * Class Obs
 * @package think\support\facade
 * @method static string put(string $name) 上传至对象存储
 * @method static ObsClient getClient() 获取对象存储客户端
 */
class Obs extends Facade
{
    protected static function getFacadeClass()
    {
        return 'obs';
    }
}