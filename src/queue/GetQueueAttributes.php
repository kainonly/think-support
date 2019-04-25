<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class GetQueueAttributes extends Common
{
    /**
     * 执行名称
     * @var string
     */
    public $Action = 'GetQueueAttributes';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * ListQueue constructor.
     * @param Instance $instance
     * @param $queueName
     */
    public function __construct(Instance $instance, $queueName)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        return $this;
    }
}