<?php
declare (strict_types=1);

namespace think\support\facade;

use Predis\Client;
use think\Facade;

/**
 * Class Redis
 * @package think\support\facade
 * @method static Client client(string $name = 'default')
 */
class Redis extends Facade
{
    protected static function getFacadeClass(): string
    {
        return 'redis';
    }
}
