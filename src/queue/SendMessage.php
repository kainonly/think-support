<?php

namespace cmq\sdk\queue;

final class SendMessage extends Common
{
    /**
     * 执行名称
     * @var string
     */
    public $Action = 'SendMessage';

    /**
     * 队列名字，在单个地域同一帐号下唯一
     * @var string
     */
    public $queueName;

    /**
     * 消息正文。至少1Byte，最大长度受限于设置的队列消息最大长度属性。
     * @var mixed
     */
    public $msgBody;

    /**
     * 单位为秒，表示该消息发送到队列后，需要延时多久用户才可见该消息。
     * @var int
     */
    public $delaySeconds;

    /**
     * SendMessage constructor.
     * @param string $queueName
     * @param mixed $msgBody
     * @param int $delaySeconds
     */
    public function __construct($queueName, $msgBody, $delaySeconds = 0)
    {
        parent::__construct();
        $this->queueName = $queueName;
        $this->msgBody = is_array($msgBody) ? json_encode($msgBody) : (string)$msgBody;
        $this->delaySeconds = $delaySeconds;
        return $this;
    }
}