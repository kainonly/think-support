<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestTopicSubscribe extends TestCase
{
    /**
     * 创建主题
     */
    public function testCreateTopic()
    {
        $res = CMQ::Topic()->CreateTopic('sub-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建订阅
     */
    public function testSubscribe()
    {
        $res = CMQ::Topic()->Subscribe(
            'sub-topic',
            'test',
            'queue',
            'normal',
            null,
            null,
            [
                'mytag'
            ]
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取订阅列表
     */
    public function testListSubscriptionByTopic()
    {
        $res = CMQ::Topic()->ListSubscriptionByTopic('sub-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 修改订阅属性
     */
    public function testSetSubscriptionAttributes()
    {
        $res = CMQ::Topic()->SetSubscriptionAttributes(
            'sub-topic',
            'test',
            'BACKOFF_RETRY'
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 删除订阅器
     */
    public function testUnsubscribe()
    {
        $res = CMQ::Topic()->Unsubscribe('sub-topic', 'test');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取订阅属性
     */
    public function testGetSubscriptionAttributes()
    {
        $res = CMQ::Topic()->GetSubscriptionAttributes('sub-topic', 'test');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 清空订阅标签
     */
    public function testClearSubscriptionFilterTags()
    {
        $res = CMQ::Topic()->ClearSubscriptionFilterTags('sub-topic', 'test');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}