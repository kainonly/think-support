<?php
declare (strict_types=1);

namespace think\support\facade;

use think\Facade;
use Elasticsearch\Client;

/**
 * Class Es
 * @package think\support\facade
 * @method static Client client(string $label = 'default') 创建 ElasticSearch 客户端
 */
class ES extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'elasticsearch';
    }
}