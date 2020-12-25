<?php
declare (strict_types=1);

namespace think\support\facade;

use Obs\ObsClient;
use think\Facade;


/**
 * Class Obs
 * @package think\support\facade
 * @method static string put(string $name) 上传至对象存储
 * @method static ObsClient getClient() 获取对象存储客户端
 * @method static array generatePostPresigned(array $conditions, int $expired = 600) 生成客户端上传 OBS 对象存储签名
 */
class Obs extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'obs';
    }
}