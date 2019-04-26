<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestQueue extends TestCase
{
    private $client;
    private $queue;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->queue = 'test';
        $this->client = CMQ::Queue();
    }

    /**
     * 创建队列
     */
    public function testCreateQueue()
    {
        $res = $this->client->CreateQueue($this->queue,
            1000000,
            null,
            null,
            null,
            null,
            60
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 列出队列
     */
    public function testListQueue()
    {
        $res = $this->client->ListQuery();
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取队列属性
     * @depends testCreateQueue
     */
    public function testGetQueueAttributes()
    {
        $res = $this->client->GetQueueAttributes($this->queue);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 设置队列属性
     * @depends testCreateQueue
     */
    public function testSetQueueAttributes()
    {
        $res = $this->client->SetQueueAttributes($this->queue, 5000000);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 删除队列
     * @depends testCreateQueue
     */
    public function testDeleteQueue()
    {
        $res = $this->client->DeleteQueue($this->queue);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}