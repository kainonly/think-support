<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestTopicMessage extends TestCase
{
    /**
     * 创建主题
     */
    public function testCreateTopic()
    {
        $res = CMQ::Topic()->CreateTopic('beta-topic');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建订阅
     */
    public function testSubscribe()
    {
        $res = CMQ::Topic()->Subscribe(
            'beta-topic',
            'test-without-tag',
            'queue',
            'test-normal'
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建带标签的订阅
     */
    public function testTagSubscribe()
    {
        $res = CMQ::Topic()->Subscribe(
            'beta-topic',
            'test-with-tag',
            'queue',
            'test-tag',
            null,
            null,
            [
                'mytag'
            ]
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 发布消息
     */
    public function testPublishMessage()
    {
        $res = CMQ::Topic()->PublishMessage('beta-topic', [
            'name' => 'kain'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 标签过滤发布消息
     */
    public function testTagPublishMessage()
    {
        $res = CMQ::Topic()->PublishMessage('beta-topic', [
            'name' => 'kain'
        ], [
            'mytag'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 批量发布消息
     */
    public function testBatchPublishMessage()
    {
        $res = CMQ::Topic()->BatchPublishMessage('beta-topic', [
            ['type' => '1'],
            ['type' => '2']
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 标签过滤批量发布消息
     */
    public function testTagBatchPublishMessage()
    {
        $res = CMQ::Topic()->BatchPublishMessage('beta-topic', [
            ['type' => '1'],
            ['type' => '2']
        ], [
            'mytag'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建路由主题
     */
    public function testCreateTopicRouterType()
    {
        $res = CMQ::Topic()->CreateTopic('router-topic', null, 2);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建订阅
     */
    public function testSubscribeRouter()
    {
        $res = CMQ::Topic()->Subscribe(
            'router-topic',
            'test',
            'queue',
            'normal',
            null,
            null,
            null,
            [
                'sys.common'
            ]
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 创建带Routerkey的订阅
     */
    public function testSubscribeRouterKey()
    {
        $res = CMQ::Topic()->Subscribe(
            'router-topic',
            'test-key',
            'queue',
            'special',
            null,
            null,
            null,
            [
                '*.common'
            ]
        );
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 发布消息
     */
    public function testPublishMessageRouter()
    {
        $res = CMQ::Topic()->PublishMessage('router-topic', [
            'name' => 'kain'
        ], null, 'sys.common');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 匹配发布消息
     */
    public function testPublishMessageRouterKey()
    {
        $res = CMQ::Topic()->PublishMessage('router-topic', [
            'name' => 'kain'
        ], null, 'app.common');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}