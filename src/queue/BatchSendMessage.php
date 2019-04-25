<?php


namespace cmq\sdk\queue;

use cmq\sdk\Common;
use cmq\sdk\HttpClient;
use cmq\sdk\Instance;

final class BatchSendMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    protected $Action = 'BatchSendMessage';

    /**
     * 队列名字
     * @var string
     */
    public $queueName;

    /**
     * 消息正文。至少1Byte，最大长度受限于设置的队列消息最大长度属性。
     * @var array
     */
    public $msgBody;

    /**
     * 单位为秒，表示该消息发送到队列后，需要延时多久用户才可见该消息。
     * @var int
     */
    public $delaySeconds;

    /**
     * BatchSendMessage constructor.
     * @param Instance $instance
     * @param $queueName
     * @param $msgBody
     * @param int $delaySeconds
     */
    public function __construct(Instance $instance, $queueName, $msgBody, $delaySeconds = 0)
    {
        parent::__construct($instance);
        $this->httpClient = new HttpClient($this->instance, 'queue');
        $this->queueName = $queueName;
        foreach ($msgBody as $key => $value) {
            $msgBody[$key] = is_array($value) ? json_encode($value) : (string)$value;
        }
        $this->msgBody = $msgBody;
        $this->delaySeconds = $delaySeconds;
        return $this;
    }
}