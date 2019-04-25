<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class DeleteMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'DeleteMessage';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * 上次消费返回唯一的消息句柄
     * @var string
     */
    public $receiptHandle;

    /**
     * DeleteMessage constructor.
     * @param Instance $instance
     * @param $queueName
     * @param $receiptHandle
     */
    public function __construct(Instance $instance, $queueName, $receiptHandle)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        $this->receiptHandle = $receiptHandle;
        return $this;
    }
}