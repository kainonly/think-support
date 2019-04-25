<?php

namespace cmq\sdk;

use cmq\sdk\topic\CreateTopic;
use cmq\sdk\topic\DeleteTopic;
use cmq\sdk\topic\GetTopicAttributes;
use cmq\sdk\topic\ListTopic;
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

    /**
     * 获取主题列表
     * @param string $searchWord
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function ListTopic($searchWord = null, $offset = null, $limit = null)
    {
        $action = new ListTopic($this->instance, $searchWord, $offset, $limit);
        return $action->result();
    }

    /**
     * 获取主题属性
     * @param string $topicName
     * @return mixed
     */
    public function GetTopicAttributes($topicName)
    {
        $action = new GetTopicAttributes($this->instance, $topicName);
        return $action->result();
    }

    /**
     * 删除主题
     * @param string $topicName
     * @return mixed
     */
    public function DeleteTopic($topicName)
    {
        $action = new DeleteTopic($this->instance, $topicName);
        return $action->result();
    }

}