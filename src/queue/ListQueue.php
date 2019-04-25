<?php

namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class ListQueue extends Common
{
    /**
     * 用于过滤队列列表，后台用模糊匹配的方式来返回符合条件的队列列表
     * @var string
     */
    public $searchWord;

    /**
     * 分页时本页获取队列列表的起始位置。
     * @var int
     */
    public $offset;

    /**
     * 分页时本页获取队列的个数，如果不传递该参数，则该参数默认为20，最大值为50
     * @var int
     */
    public $limit;

    /**
     * ListQueue constructor.
     * @param Instance $instance
     * @param $searchWord
     * @param $offset
     * @param $limit
     */
    public function __construct(Instance $instance, $searchWord, $offset, $limit)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->searchWord = $searchWord;
        $this->offset = $offset;
        $this->limit = $limit;
        return $this;
    }
}