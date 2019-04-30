<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class DeleteTopic extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'DeleteTopic';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    public function __construct(Instance $instance, $topicName)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
    }
}