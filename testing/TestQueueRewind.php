<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestQueueRewind extends TestCase
{
    /**
     * 创建队列
     */
    public function testCreateQueue()
    {
        $res = CMQ::Queue()->CreateQueue('beta',
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
        $res = CMQ::Queue()->SendMessage('beta', [
            'name' => 'kain'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 接收并删除消息
     */
    public function testReceiveAndDeleteMessage()
    {
        $res1 = CMQ::Queue()->ReceiveMessage('beta');
        if ($res1['code'] == 0) {
            $res2 = CMQ::Queue()->DeleteMessage('beta', $res1['receiptHandle']);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }

    /**
     * 回溯1小时前删除的消息
     */
    public function testRewindQueue()
    {
        $res = CMQ::Queue()->RewindQueue('beta', time() - 1800);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

}