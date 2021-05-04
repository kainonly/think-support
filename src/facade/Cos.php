<?php
declare (strict_types=1);

namespace think\support\facade;

use think\Facade;
use think\qcloud\extra\CosInterface;

/**
 * Class Cos
 * @package think\support\facade
 * @method static array getOption() 获取对象存储配置
 * @method static string put(string $name) 上传一个对象至存储桶
 * @method static void delete(array $keys) 在存储桶中批量删除对象
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成对象存储 API 签名
 */
class Cos extends Facade
{
    protected static function getFacadeClass(): string
    {
        return CosInterface::class;
    }
}