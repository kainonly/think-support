<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestQueueMessage extends TestCase
{
    /**
     * 创建队列
     */
    public function testCreateQueue()
    {
        $res = CMQ::Queue()->CreateQueue('send',
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
        $res = CMQ::Queue()->SendMessage('send', [
            'name' => 'kain'
        ]);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 接收消息并删除
     */
    public function testReceiveDeleteMessage()
    {
        $res1 = CMQ::Queue()->ReceiveMessage('send');
        if ($res1['code'] == 0) {
            $res2 = CMQ::Queue()->DeleteMessage('send', $res1['receiptHandle']);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }

    /**
     * 批量发送
     */
    public function testBatchSendMessage()
    {
        $res = CMQ::Queue()->BatchSendMessage('send', [
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
        $res1 = CMQ::Queue()->BatchReceiveMessage('send', 16);
        if ($res1['code'] == 0) {
            $receiptHandle = array_map(function ($item) {
                return $item['receiptHandle'];
            }, $res1['msgInfoList']);
            $res2 = CMQ::Queue()->BatchDeleteMessage('send', $receiptHandle);
            $this->assertTrue($res2['code'] == 0, $res2['message']);
        }
    }
}