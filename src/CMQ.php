<?php

namespace cmq\sdk;

use cmq\sdk\queue\CreateQueue;
use cmq\sdk\queue\ListQueue;
use cmq\sdk\queue\SendMessage;

final class CMQ
{
    private $instance;

    public static function Run($instance = 'default')
    {
        return new CMQ(new Instance(
            config('cmq.path'),
            config('cmq.signature_method'),
            config('cmq.' . $instance . '.extranet'),
            config('cmq.' . $instance . '.secret_id'),
            config('cmq.' . $instance . '.secret_key'),
            config('cmq.' . $instance . '.region')
        ));
    }

    /**
     * CMQ constructor.
     * @param $instance Instance
     */
    public function __construct($instance)
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
                                $maxMsgHeapNum = 100000000,
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
     * @param null $searchWord
     * @param null $offset
     * @param null $limit
     * @return mixed
     */
    public function ListQuery($searchWord = null, $offset = null, $limit = null)
    {
        $action = new ListQueue($this->instance, $searchWord, $offset, $limit);
        return $action->result();
    }

    /**
     * 发送消息队列
     * @param $queueName
     * @param $msgBody
     * @param int $delaySeconds
     * @return array
     */
    public function SendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $action = new SendMessage($this->instance, $queueName, $msgBody, $delaySeconds);
        return $action->result();
    }
}