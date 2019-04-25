<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class TestTopic extends TestCase
{
    private $client;
    private $topic = 'test-topic';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = CMQ::Topic();
    }

    public function testCreateTopic()
    {
        $res = $this->client->CreateTopic($this->topic);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateTopic
     */
    public function testSetTopicAttributes()
    {
        $res = $this->client->SetTopicAttributes($this->topic, 131072);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    public function testListTopic()
    {
        $res = $this->client->ListTopic();
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * @depends testCreateTopic
     */
    public function testGetTopicAttributes()
    {
        $res = $this->client->GetTopicAttributes($this->topic);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    public function testDeleteTopic()
    {
        $res = $this->client->DeleteTopic($this->topic);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}