<?php

namespace think\support\facade;

use Elasticsearch\Client;
use think\Facade;

/**
 * Class Elastic
 * @package think\support\facade
 * @method static Client client() ElasticSearch 客户端
 * @method static Client create(string $label) 创建 ElasticSearch 客户端
 */
final class Elastic extends Facade
{
    protected static function getFacadeClass()
    {
        return 'elastic';
    }
}