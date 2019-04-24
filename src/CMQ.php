<?php

namespace cmq\sdk;

use cmq\sdk\param\SendMessage;

final class CMQ
{
    /**
     * SendMessage constructor.
     * @param string $queueName
     * @param mixed $msgBody
     * @param int $delaySeconds
     */
    public static function SendMessage($queueName, $msgBody, $delaySeconds = 0)
    {
        $httpClient = new HttpClient();
        $queue = new SendMessage($queueName, $msgBody, $delaySeconds);
    }

}