<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class BatchReceiveMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'BatchReceiveMessage';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * 本次消费的消息数量
     * @var
     */
    public $numOfMsg;

    /**
     * 本次请求的长轮询等待时间
     * @var mixed
     */
    public $pollingWaitSeconds;

    /**
     * BatchReceiveMessage constructor.
     * @param Instance $instance
     * @param $queueName
     * @param $numOfMsg
     * @param $pollingWaitSeconds
     */
    public function __construct(Instance $instance, $queueName, $numOfMsg, $pollingWaitSeconds)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        $this->numOfMsg = $numOfMsg;
        $this->pollingWaitSeconds = $pollingWaitSeconds;
    }
}