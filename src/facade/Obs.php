<?php
declare (strict_types=1);

namespace think\support\facade;

use Obs\ObsClient;
use think\Facade;
use think\huaweicloud\extra\ObsInterface;

/**
 * Class Obs
 * @package think\support\facade
 * @method static ObsClient getClient() 获取 Obs 客户端
 * @method static string put(string $name) 上传一个对象至存储桶
 * @method static void delete(array $keys) 在存储桶中批量删除对象
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成对象存储 API 签名
 */
class Obs extends Facade
{
    protected static function getFacadeClass(): string
    {
        return ObsInterface::class;
    }
}