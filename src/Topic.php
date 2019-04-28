<?php

namespace cmq\sdk;

use cmq\sdk\topic\BatchPublishMessage;
use cmq\sdk\topic\ClearSubscriptionFilterTags;
use cmq\sdk\topic\CreateTopic;
use cmq\sdk\topic\DeleteTopic;
use cmq\sdk\topic\GetSubscriptionAttributes;
use cmq\sdk\topic\GetTopicAttributes;
use cmq\sdk\topic\ListSubscriptionByTopic;
use cmq\sdk\topic\ListTopic;
use cmq\sdk\topic\PublishMessage;
use cmq\sdk\topic\SetSubscriptionAttributes;
use cmq\sdk\topic\SetTopicAttributes;
use cmq\sdk\topic\Subscribe;
use cmq\sdk\topic\Unsubscribe;

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

    /**
     * 发布消息
     * @param string $topicName
     * @param mixed $msgBody
     * @param array $msgTag
     * @param string $routingKey
     * @return mixed
     */
    public function PublishMessage($topicName, $msgBody, $msgTag = [], $routingKey = null)
    {
        $action = new PublishMessage($this->instance, $topicName, $msgBody, $msgTag, $routingKey);
        return $action->result();
    }

    /**
     * 批量发布消息
     * @param string $topicName
     * @param array $msgBody
     * @param array $msgTag
     * @param string $routingKey
     * @return mixed
     */
    public function BatchPublishMessage($topicName, $msgBody, $msgTag = [], $routingKey = null)
    {
        $action = new BatchPublishMessage($this->instance, $topicName, $msgBody, $msgTag, $routingKey);
        return $action->result();
    }

    /**
     * 创建订阅
     * @param string $topicName
     * @param string $subscriptionName
     * @param string $protocol
     * @param string $endpoint
     * @param string $notifyStrategy
     * @param string $notifyContentFormat
     * @param array $filterTag
     * @param array $bindingKey
     * @return mixed
     */
    public function Subscribe($topicName,
                              $subscriptionName,
                              $protocol,
                              $endpoint,
                              $notifyStrategy = null,
                              $notifyContentFormat = null,
                              $filterTag = null,
                              $bindingKey = [])
    {
        $action = new Subscribe(
            $this->instance,
            $topicName,
            $subscriptionName,
            $protocol,
            $endpoint,
            $notifyStrategy,
            $notifyContentFormat,
            $filterTag,
            $bindingKey
        );
        return $action->result();
    }

    /**
     * 获取订阅列表
     * @param string $topicName
     * @param string $searchWord
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function ListSubscriptionByTopic($topicName, $searchWord = null, $offset = null, $limit = null)
    {
        $action = new ListSubscriptionByTopic($this->instance, $topicName, $searchWord, $offset, $limit);
        return $action->result();
    }

    /**
     * 修改订阅属性
     * @param string $topicName
     * @param string $subscriptionName
     * @param array $bindingKey
     * @param string $notifyStrategy
     * @param string $notifyContentFormat
     * @param array $filterTag
     * @return mixed
     */
    public function SetSubscriptionAttributes($topicName,
                                              $subscriptionName,
                                              $bindingKey,
                                              $notifyStrategy = null,
                                              $notifyContentFormat = null,
                                              $filterTag = null)
    {
        $action = new SetSubscriptionAttributes(
            $this->instance,
            $topicName,
            $subscriptionName,
            $notifyStrategy,
            $notifyContentFormat,
            $filterTag,
            $bindingKey
        );
        return $action->result();
    }

    /**
     * 删除订阅
     * @param string $topicName
     * @param string $subscriptionName
     * @return mixed
     */
    public function Unsubscribe($topicName, $subscriptionName)
    {
        $action = new Unsubscribe(
            $this->instance,
            $topicName,
            $subscriptionName
        );
        return $action->result();
    }

    /**
     * 获取订阅属性
     * @param string $topicName
     * @param string $subscriptionName
     * @return mixed
     */
    public function GetSubscriptionAttributes($topicName, $subscriptionName)
    {
        $action = new GetSubscriptionAttributes(
            $this->instance,
            $topicName,
            $subscriptionName
        );
        return $action->result();
    }

    /**
     * 清空订阅标签
     * @param string $topicName
     * @param string $subscriptionName
     * @return mixed
     */
    public function ClearSubscriptionFilterTags($topicName, $subscriptionName)
    {
        $action = new ClearSubscriptionFilterTags(
            $this->instance,
            $topicName,
            $subscriptionName
        );
        return $action->result();
    }
}