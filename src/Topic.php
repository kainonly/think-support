<?php

namespace cmq\sdk;

use cmq\sdk\topic\CreateTopic;
use cmq\sdk\topic\SetTopicAttributes;

final class Topic
{
    /**
     * 实例配置
     * @var Instance
     */
    private $instance;

    /**
     * Topic constructor.
     * @param Instance $instance
     */
    public function __construct(Instance $instance)
    {
        $this->instance = $instance;
    }

    /**
     * 创建主题
     * @param string $topicName
     * @param int $maxMsgSize
     * @param int $filterType
     * @return mixed
     */
    public function CreateTopic($topicName, $maxMsgSize = null, $filterType = null)
    {
        $action = new CreateTopic($this->instance, $topicName, $maxMsgSize, $filterType);
        return $action->result();
    }

    /**
     * 修改主题属性
     * @param string $topicName
     * @param int $maxMsgSize
     * @return mixed
     */
    public function SetTopicAttributes($topicName, $maxMsgSize = null)
    {
        $action = new SetTopicAttributes($this->instance, $topicName, $maxMsgSize);
        return $action->result();
    }
}