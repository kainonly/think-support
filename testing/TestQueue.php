<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestQueue extends TestCase
{
    private $client;
    private $queue = 'test-queue';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = CMQ::Queue();
    }

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

    public function testListQueue()
    {
        $res = $this->client->ListQuery();
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateQueue
     */
    public function testGetQueueAttributes()
    {
        $res = $this->client->GetQueueAttributes($this->queue);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateQueue
     */
    public function testSetQueueAttributes()
    {
        $res = $this->client->SetQueueAttributes($this->queue, 5000000);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateQueue
     */
    public function testRewindQueue()
    {
        $res = $this->client->RewindQueue($this->queue, time() + 30);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }


    public function testDeleteQueue()
    {

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