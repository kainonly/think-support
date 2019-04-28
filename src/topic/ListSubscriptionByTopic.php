<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class ListSubscriptionByTopic extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'ListSubscriptionByTopic';

    /**
     * 主题名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $topicName;

    /**
     * 用于过滤主题列表
     * @var string
     */
    public $searchWord;

    /**
     * 分页时本页获取主题列表的起始位置
     * @var int
     */
    public $offset;

    /**
     * 分页时本页获取主题的个数
     * @var int
     */
    public $limit;

    public function __construct(Instance $instance, $topicName, $searchWord, $offset, $limit)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->topicName = $topicName;
        $this->searchWord = $searchWord;
        $this->offset = $offset;
        $this->limit = $limit;
        return $this;
    }
}