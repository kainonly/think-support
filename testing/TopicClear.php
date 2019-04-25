<?php

use PHPUnit\Framework\TestCase;
use cmq\sdk\CMQ;

class Topic extends TestCase
{
    private $client;
    private $topic = 'test-topic';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = CMQ::Topic();
    }

    /**
     * @depends testCreateTopic
     */
    public function testDeleteTopic()
    {
        $res = $this->client->DeleteTopic($this->topic);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}