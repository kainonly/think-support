<?php

namespace think\support\facade;

use think\Facade;
use Elasticsearch\Client;

/**
 * Class Elastic
 * @package think\support\facade
 * @method static Client client(string $label = 'default') 创建 ElasticSearch 客户端
 */
class Elastic extends Facade
{
    protected static function getFacadeClass()
    {
        return 'elastic';
    }
}