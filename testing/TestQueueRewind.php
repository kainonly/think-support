<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestQueueRewind extends TestCase
{
    private $client;
    private $queue;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->queue = 'beta';
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
            3600
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 发送消息
     */
    public function testSendMessage()
    {
        $res = $this->client->SendMessage($this->queue, [
            'name' => 'kain'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 接收并删除消息
     */
    public function testReceiveAndDeleteMessage()
    {
        $res1 = $this->client->ReceiveMessage($this->queue);
        if ($res1['code'] == 0) {
            $res2 = $this->client->DeleteMessage($this->queue, $res1['receiptHandle']);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }

    /**
     * 回溯1小时前删除的消息
     */
    public function testRewindQueue()
    {
        $res = $this->client->RewindQueue($this->queue, time() - 3600);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

}