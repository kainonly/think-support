<?php

namespace cmq\testing;

use cmq\sdk\CMQ;
use Tests\TestCase;

class TestQueue extends TestCase
{
    /**
     * 创建队列
     */
    public function testCreateQueue()
    {
        $res = CMQ::Queue()->CreateQueue('test',
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
     * 列出队列
     */
    public function testListQueue()
    {
        $res = CMQ::Queue()->ListQuery();
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 获取队列属性
     */
    public function testGetQueueAttributes()
    {
        $res = CMQ::Queue()->GetQueueAttributes('test');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 设置队列属性
     */
    public function testSetQueueAttributes()
    {
        $res = CMQ::Queue()->SetQueueAttributes('test', 5000000);
        $this->assertTrue($res['code'] == 0, $res['message']);
    }

    /**
     * 删除队列
     */
    public function testDeleteQueue()
    {
        $res = CMQ::Queue()->DeleteQueue('test');
        $this->assertTrue($res['code'] == 0, $res['message']);
    }
}