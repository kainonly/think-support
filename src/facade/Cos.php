<?php
declare (strict_types=1);

namespace think\support\facade;

use think\Facade;
use OSS\OssClient;


/**
 * Class Cos
 * @package think\support\facade
 * @method static string put(string $name) 上传至对象存储
 * @method static array getOption() 获取对象存储配置
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成客户端上传 COS 对象存储签名
 */
class Cos extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'cos';
    }
}