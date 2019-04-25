<?php

namespace cmq\sdk;

use cmq\sdk\queue\CreateQueue;
use cmq\sdk\queue\GetQueueAttributes;
use cmq\sdk\queue\ListQueue;
use cmq\sdk\queue\SendMessage;

final class CMQ
{
    private $instance;

    /**
     * 创建预设配置 CMQ 客户端
     * @param string $instance 预设名
     * @return CMQ
     */
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
     * 创建自定义配置 CMQ 客户端
     * @param string $path 请求固定路径
     * @param string $signature_method 加密方式
     * @param boolean $extranet 是否为外网
     * @param string $secret_id SecretId
     * @param string $secret_key SecretKey
     * @param string $region 地区
     * @return CMQ
     */
    public static function Create($path, $signature_method, $extranet, $secret_id, $secret_key, $region)
    {
        return new CMQ(new Instance(
            $path,
            $signature_method,
            $extranet,
            $secret_id,
            $secret_key,
            $region
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