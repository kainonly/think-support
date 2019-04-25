<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class Unsubscribe extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'Unsubscribe';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    /**
     * 订阅名字，在单个地域同一帐号的同一主题下唯一
     * @var string
     */
    public $subscriptionName;

    public function __construct(Instance $instance, $topicName, $subscriptionName)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
        $this->subscriptionName = $subscriptionName;
        return $this;
    }
}