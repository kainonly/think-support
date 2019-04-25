<?php

namespace cmq\sdk;

use GuzzleHttp\Client;

final class HttpClient
{
    /**
     * 请求方式
     * @var string
     */
    private $method = 'POST';

    /**
     * 请求地址
     * @var string
     */
    private $uri;

    /**
     * 请求固定路径
     * @var string
     */
    private $path;

    /**
     * 请求协议
     * @var string
     */
    private $protocol;

    /**
     * 请求客户端
     * @var Client
     */
    private $client;

    public function __construct($type = 'queue')
    {
        $region = config('cmq.default.region');
        if (config('cmq.extranet')) {
            $this->protocol = 'https://';
            $this->uri = 'cmq-' . $type . '-' . $region . '.api.qcloud.com';
        } else {
            $this->protocol = 'http://';
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
     * 发起请求
     * @param $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function Req($body)
    {
        return $this->client->post($this->path, [
            'form_params' => $body
        ]);
    }
}