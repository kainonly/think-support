<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class RewindQueue extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'RewindQueue';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * 设定该时间
     * @var
     */
    public $startConsumeTime;

    /**
     * RewindQueue constructor.
     * @param Instance $instance
     * @param $queueName
     * @param $startConsumeTime
     */
    public function __construct(Instance $instance, $queueName, $startConsumeTime)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        $this->startConsumeTime = $startConsumeTime;
        return $this;
    }
}