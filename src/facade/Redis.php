<?php

namespace think\support\facade;

use Predis\Client;
use Predis\Command\CommandInterface;
use Predis\Configuration\OptionsInterface;
use Predis\Connection\ConnectionInterface;
use Predis\Pipeline\Pipeline;
use Predis\Profile\ProfileInterface;
use Predis\PubSub\Consumer as PubSubConsumer;
use Predis\Transaction\MultiExec as MultiExecTransaction;
use think\Facade;

/**
 * Class Redis
 * @package think\support\facade
 * @method static Client client(string $name = 'default')
 */
class Redis extends Facade
{
    protected static function getFacadeClass()
    {
        return 'redis';
    }
}
