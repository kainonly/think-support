<?php

namespace cmq\sdk;

use cmq\sdk\queue\SendMessage;

final class CMQ
{
    private $instance;

    public static function Run($instance = 'default')
    {

        return new CMQ(new Instance(
            config('cmq.path'),
            config('cmq.signature_method'),
            config('cmq.' . $instance . '.extranet'),
            config('cmq.' . $instance . '.secret_id'),
            config('cmq.' . $instance . '.secret_key'),
            config('cmq.' . $instance . '.region')
        ));
    }

    /**
     * CMQ constructor.
     * @param $instance Instance
     */
    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    /**
     * SendMessage constructor.
     * @param $queueName
     * @param $msgBody
     * @param int $delaySeconds
     * @return array
     */
    public function SendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $action = new SendMessage($this->instance, $queueName, $msgBody, $delaySeconds);
        return $action->result();
    }

}