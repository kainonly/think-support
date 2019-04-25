<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class CreateQueue extends Common
{
    /**
     * 执行名称
     * @var string
     */
    public $Action = 'CreateQueue';

    /**
     * 队列名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $queueName;

    /**
     * 最大堆积消息数
     * @var int
     */
    public $maxMsgHeapNum;

    /**
     * 消息接收长轮询等待时间
     * @var int
     */
    public $pollingWaitSeconds;

    /**
     * 消息可见性超时
     * @var int
     */
    public $visibilityTimeout;

    /**
     * 消息最大长度
     * @var int
     */
    public $maxMsgSize;

    /**
     * 消息保留周期
     * @var int
     */
    public $msgRetentionSeconds;

    /**
     * 队列是否开启回溯消息能力
     * @var int
     */
    public $rewindSeconds;

    public function __construct(Instance $instance,
                                $queueName,
                                $maxMsgHeapNum,
                                $pollingWaitSeconds,
                                $visibilityTimeout,
                                $maxMsgSize,
                                $msgRetentionSeconds,
                                $rewindSeconds)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        $this->maxMsgHeapNum = $maxMsgHeapNum;
        $this->pollingWaitSeconds = $pollingWaitSeconds;
        $this->visibilityTimeout = $visibilityTimeout;
        $this->maxMsgSize = $maxMsgSize;
        $this->msgRetentionSeconds = $msgRetentionSeconds;
        $this->rewindSeconds = $rewindSeconds;
        return $this;
    }
}