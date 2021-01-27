<?php
declare (strict_types=1);

namespace think\support\facade;

use think\Facade;
use OSS\OssClient;


/**
 * Class Oss
 * @package think\support\facade
 * @method static string put(string $name) 上传对象
 * @method static OssClient getClient(bool $extranet = false) 获取客户端
 * @method static void delete(array $keys) 删除对象
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成签名
 */
class Oss extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'oss';
    }
}