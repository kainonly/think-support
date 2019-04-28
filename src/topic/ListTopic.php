<?php

namespace cmq\sdk\topic;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class ListTopic extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'ListTopic';

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

    public function __construct(Instance $instance, $searchWord, $offset, $limit)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'topic');
        $this->searchWord = $searchWord;
        $this->offset = $offset;
        $this->limit = $limit;
        return $this;
    }
}