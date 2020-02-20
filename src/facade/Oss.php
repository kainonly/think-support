<?php

namespace think\support\facade;

use think\Facade;
use OSS\OssClient;


/**
 * Class Oss
 * @package think\support\facade
 * @method static string put(string $name) 上传至对象存储
 * @method static OssClient getClient() 获取对象存储客户端
 */
class Oss extends Facade
{
    protected static function getFacadeClass()
    {
        return 'oss';
    }
}