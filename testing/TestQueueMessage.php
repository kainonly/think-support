<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestQueueMessage extends TestCase
{
    private $client;
    private $queue = 'send';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
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
     * 接收消息并删除
     */
    public function testReceiveDeleteMessage()
    {
        $res1 = $this->client->ReceiveMessage($this->queue);
        if ($res1['code'] == 0) {
            $res2 = $this->client->DeleteMessage($this->queue, $res1['receiptHandle']);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }

    /**
     * 批量发送
     */
    public function testBatchSendMessage()
    {
        $res = $this->client->BatchSendMessage($this->queue, [
            ['type' => '1'],
            ['type' => '2']
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 批量接收并批量删除
     */
    public function testBatchReceiveDeleteMessage()
    {
        $res1 = $this->client->BatchReceiveMessage($this->queue, 16);
        if ($res1['code'] == 0) {
            $receiptHandle = array_map(function ($item) {
                return $item['receiptHandle'];
            }, $res1['msgInfoList']);
            $res2 = $this->client->BatchDeleteMessage($this->queue, $receiptHandle);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }
}