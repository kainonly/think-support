<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class Subscribe extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'Subscribe';

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

    /**
     * 订阅的协议，目前支持两种协议：HTTP、Queue
     * @var string
     */
    public $protocol;

    /**
     * 接收投递消息的 endpoint
     * @var string
     */
    public $endpoint;

    /**
     * 向 endpoint 推送消息
     * @var string
     */
    public $notifyStrategy;

    /**
     * 推送内容的格式
     * @var string
     */
    public $notifyContentFormat;

    /**
     * 消息正文
     * @var array
     */
    public $filterTag;

    /**
     * bindingKey
     * @var array
     */
    public $bindingKey;

    public function __construct(Instance $instance,
                                $topicName,
                                $subscriptionName,
                                $protocol,
                                $endpoint,
                                $notifyStrategy,
                                $notifyContentFormat,
                                $filterTag,
                                $bindingKey)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'TestTopic');
        $this->topicName = $topicName;
        $this->subscriptionName = $subscriptionName;
        $this->protocol = $protocol;
        $this->endpoint = $endpoint;
        $this->notifyStrategy = $notifyStrategy;
        $this->notifyContentFormat = $notifyContentFormat;
        $this->filterTag = $filterTag;
        $this->bindingKey = $bindingKey;
        return $this;
    }
}