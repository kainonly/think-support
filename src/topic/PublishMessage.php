<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class PublishMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'PublishMessage';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    /**
     * 消息正文
     * @var mixed
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
        $this->msgBody = is_array($msgBody) ? json_encode($msgBody) : (string)$msgBody;
        $this->msgTag = $msgTag;
        $this->routingKey = $routingKey;
    }
}