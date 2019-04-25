<?php

namespace cmq\sdk;

use cmq\sdk\queue\SendMessage;

final class CMQ
{
    /**
     * SendMessage constructor.
     * @param $queueName
     * @param $msgBody
     * @param int $delaySeconds
     * @return array
     */
    public static function SendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $httpClient = new HttpClient('queue');
        $action = new SendMessage($queueName, $msgBody, $delaySeconds);
        return $action->result($httpClient);
    }

}