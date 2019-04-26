<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestQueueMessage extends TestCase
{
    private $client;
    private $queue = 'test-queue';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = CMQ::Queue();
    }

    /**
     * @depends testCreateQueue
     */
    public function testSendMessage()
    {
        $res = $this->client->SendMessage($this->queue, [
            'name' => 'kain'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateQueue
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
     * @depends testSendMessage
     */
    public function testReceiveMessage()
    {
        $res = $this->client->ReceiveMessage($this->queue);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testBatchSendMessage
     */
    public function testBatchReceiveMessage()
    {
        $res = $this->client->BatchReceiveMessage($this->queue);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    public function testDeleteMessage()
    {
    }


    public function testBatchDeleteMessage()
    {

    }
}