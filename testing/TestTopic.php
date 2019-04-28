<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestTopic extends TestCase
{
    /**
     * 创建主题
     */
    public function testCreateTopic()
    {
        $res = CMQ::Topic()->CreateTopic('test-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 设置主题属性
     */
    public function testSetTopicAttributes()
    {
        $res = CMQ::Topic()->SetTopicAttributes('test-topic', 131072);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取主题列表
     */
    public function testListTopic()
    {
        $res = CMQ::Topic()->ListTopic();
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取主题属性
     */
    public function testGetTopicAttributes()
    {
        $res = CMQ::Topic()->GetTopicAttributes('test-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 删除主题
     */
    public function testDeleteTopic()
    {
        $res = CMQ::Topic()->DeleteTopic('test-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}