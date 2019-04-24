<?php

namespace cmq\sdk;

use GuzzleHttp\Client;

final class HttpClient
{
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://cmq-queue-gz.api.qcloud.com',
            'timeout' => 2.0,
        ]);
    }

    public function Req($url, $body)
    {
        return $this->httpClient->post($url, [
            'body' => $body
        ]);
    }
}