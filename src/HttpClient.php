<?php

namespace cmq\sdk;

use GuzzleHttp\Client;

final class HttpClient
{
    private $method = 'POST';
    private $uri;
    private $path;
    private $protocol;
    private $client;

    public function __construct($type = 'queue')
    {
        $region = config('cmq.default.region');
        if (config('cmq.extranet')) {
            $this->protocol = 'https';
            $this->uri = 'cmq-' . $type . '-' . $region . '.api.qcloud.com';
        } else {
            $this->protocol = 'http';
            $this->uri = 'cmq-' . $type . '-' . $region . '.api.tencentyun.com';
        }
        $this->path = config('cmq.path');
        $this->client = new Client([
            'base_uri' => $this->protocol . $this->uri,
            'timeout' => 2.0,
        ]);
    }

    /**
     * 获取请求部分签名参数
     * @return string
     */
    public function getSignRequest()
    {
        return $this->method . $this->uri . $this->path;
    }

    /**
     * 请求
     * @param $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function Req($body)
    {
        return $this->client->post($this->path, [
            'body' => $body
        ]);
    }
}