<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class BatchPublishMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'BatchPublishMessage';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    /**
     * 消息正文
     * @var array
     */
    public $msgBody;

    /**
     * 消息过滤标签
     * @var array
     */
    public $msgTag;

    /**
     * 发送消息的路由路径
     * @var string
     */
    public $routingKey;

    public function __construct(Instance $instance, $topicName, $msgBody, $msgTag, $routingKey)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
        foreach ($msgBody as $key => $value) {
            $msgBody[$key] = is_array($value) ? json_encode($value) : (string)$value;
        }
        $this->msgBody = $msgBody;
        $this->msgTag = $msgTag;
        $this->routingKey = $routingKey;
        return $this;
    }
}