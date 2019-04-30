<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class CreateTopic extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'CreateTopic';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    /**
     * 消息最大长度
     * @var int
     */
    public $maxMsgSize;

    /**
     * 用于指定主题的消息匹配策略
     * @var int
     */
    public $filterType;

    public function __construct(Instance $instance, $topicName, $maxMsgSize, $filterType)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
        $this->maxMsgSize = $maxMsgSize;
        $this->filterType = $filterType;
    }
}