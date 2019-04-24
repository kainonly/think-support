<?php

namespace cmq\sdk;

use cmq\sdk\queue\SendMessage;

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
        $action = new SendMessage($queueName, $msgBody, $delaySeconds);
    }

}