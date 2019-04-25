<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class ReceiveMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    public $Action = 'ReceiveMessage';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * 本次请求的长轮询等待时间
     * @var mixed
     */
    public $pollingWaitSeconds;

    /**
     * SendMessage constructor.
     * @param string $queueName
     * @param mixed $msgBody
     * @param int $delaySeconds
     */
    public function __construct(Instance $instance, $queueName, $pollingWaitSeconds)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        $this->pollingWaitSeconds = $pollingWaitSeconds;
        return $this;
    }
}