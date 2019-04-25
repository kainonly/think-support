<?php

namespace cmq\sdk;

use cmq\sdk\queue\BatchReceiveMessage;
use cmq\sdk\queue\BatchSendMessage;
use cmq\sdk\queue\CreateQueue;
use cmq\sdk\queue\DeleteQueue;
use cmq\sdk\queue\GetQueueAttributes;
use cmq\sdk\queue\ListQueue;
use cmq\sdk\queue\ReceiveMessage;
use cmq\sdk\queue\RewindQueue;
use cmq\sdk\queue\SendMessage;
use cmq\sdk\queue\SetQueueAttributes;

final class Queue
{
    /**
     * 实例配置
     * @var Instance
     */
    private $instance;

    /**
     * Queue constructor.
     * @param $instance
     */
    public function __construct(Instance $instance)
    {
        $this->instance = $instance;
    }

    /**
     * 创建消息队列
     * @param string $queueName 队列名称
     * @param int $maxMsgHeapNum
     * @param int $pollingWaitSeconds
     * @param int $visibilityTimeout
     * @param int $maxMsgSize
     * @param int $msgRetentionSeconds
     * @param int $rewindSeconds
     * @return mixed
     */
    public function CreateQueue($queueName,
                                $maxMsgHeapNum = 1000000,
                                $pollingWaitSeconds = 0,
                                $visibilityTimeout = 30,
                                $maxMsgSize = 65536,
                                $msgRetentionSeconds = 345600,
                                $rewindSeconds = 0)
    {
        $action = new CreateQueue(
            $this->instance,
            $queueName,
            $maxMsgHeapNum,
            $pollingWaitSeconds,
            $visibilityTimeout,
            $maxMsgSize,
            $msgRetentionSeconds,
            $rewindSeconds
        );
        return $action->result();
    }

    /**
     * 获取队列列表
     * @param string $searchWord
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function ListQuery($searchWord = null, $offset = null, $limit = null)
    {
        $action = new ListQueue($this->instance, $searchWord, $offset, $limit);
        return $action->result();
    }

    /**
     * 获取队列属性
     * @param $queueName
     * @return mixed
     */
    public function GetQueueAttributes($queueName)
    {
        $action = new GetQueueAttributes($this->instance, $queueName);
        return $action->result();
    }

    /**
     * 修改队列属性
     * @param string $queueName
     * @param int $maxMsgHeapNum
     * @param int $pollingWaitSeconds
     * @param int $visibilityTimeout
     * @param int $maxMsgSize
     * @param int $msgRetentionSeconds
     * @param int $rewindSeconds
     * @return mixed
     */
    public function SetQueueAttributes($queueName,
                                       $maxMsgHeapNum = null,
                                       $pollingWaitSeconds = null,
                                       $visibilityTimeout = null,
                                       $maxMsgSize = null,
                                       $msgRetentionSeconds = null,
                                       $rewindSeconds = null)
    {
        $action = new SetQueueAttributes(
            $this->instance,
            $queueName,
            $maxMsgHeapNum,
            $pollingWaitSeconds,
            $visibilityTimeout,
            $maxMsgSize,
            $msgRetentionSeconds,
            $rewindSeconds
        );
        return $action->result();
    }

    /**
     * 删除队列
     * @param string $queueName
     * @return mixed
     */
    public function DeleteQueue($queueName)
    {
        $action = new DeleteQueue($this->instance, $queueName);
        return $action->result();
    }

    /**
     * 回溯队列
     * @param string $queueName
     * @param int $startConsumeTime
     * @return mixed
     */
    public function RewindQueue($queueName, $startConsumeTime)
    {
        $action = new RewindQueue($this->instance, $queueName, $startConsumeTime);
        return $action->result();
    }

    /**
     * 发送消息队列
     * @param string $queueName
     * @param mixed $msgBody
     * @param int $delaySeconds
     * @return array
     */
    public function SendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $action = new SendMessage($this->instance, $queueName, $msgBody, $delaySeconds);
        return $action->result();
    }

    /**
     * 批量发送消息
     * @param string $queueName
     * @param array $msgBody
     * @param int $delaySeconds
     * @return array
     */
    public function BatchSendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $action = new BatchSendMessage($this->instance, $queueName, $msgBody, $delaySeconds);
        return $action->result();
    }

    /**
     * 消费消息
     * @param string $queueName
     * @param int $pollingWaitSeconds
     * @return mixed
     */
    public function ReceiveMessage($queueName, $pollingWaitSeconds = null)
    {
        $action = new ReceiveMessage($this->instance, $queueName, $pollingWaitSeconds);
        return $action->result();
    }

    /**
     * 批量消费消息
     * @param $queueName
     * @param int $numOfMsg
     * @param null $pollingWaitSeconds
     * @return mixed
     */
    public function BatchReceiveMessage($queueName, $numOfMsg = 1, $pollingWaitSeconds = null)
    {
        $action = new BatchReceiveMessage($this->instance, $queueName, $numOfMsg, $pollingWaitSeconds);
        return $action->result();
    }
}