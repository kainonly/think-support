<?php
declare (strict_types=1);

namespace think\support\facade;

use think\Facade;
use OSS\OssClient;


/**
 * Class Oss
 * @package think\support\facade
 * @method static string put(string $name) 上传至对象存储
 * @method static OssClient getClient(bool $extranet = false) 获取对象存储客户端
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成客户端上传OSS对象存储签名
 */
class Oss extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'oss';
    }
}