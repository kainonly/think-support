<?php

namespace think\support\facade;

use Closure;
use think\Facade;
use simplify\amqp\AMQPClient;
use think\amqp\contract\AMQPInterface;

/**
 * Class AMQP
 * @package think\support\facade
 * @method static AMQPClient client(string $name)
 * @method static void channel(Closure $closure, array $options = [])
 * @method static void channeltx(Closure $closure, array $options = [])
 */
class AMQP extends Facade
{
    protected static function getFacadeClass()
    {
        return AMQPInterface::class;
    }
}