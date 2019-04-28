<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class SetTopicAttributes extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'SetTopicAttributes';

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

    public function __construct(Instance $instance, $topicName, $maxMsgSize)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
        $this->maxMsgSize = $maxMsgSize;
        return $this;
    }
}