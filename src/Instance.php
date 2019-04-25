<?php

namespace cmq\sdk;

final class Instance
{
    /**
     * 请求固定路径
     * @var string
     */
    public $path;

    /**
     * 加密算法
     * @var string
     */
    public $signatureMethod;

    /**
     * 是否为外网
     * @var boolean
     */
    public $extranet;

    /**
     * 实例 ID
     * @var string
     */
    public $secretId;

    /**
     * 实例 Key
     * @var string
     */
    public $secretKey;

    /**
     * 区域
     * @var string
     */
    public $region;

    /**
     * Instance constructor.
     * @param $path
     * @param $signatureMethod
     * @param $extranet
     * @param $secretId
     * @param $secretKey
     * @param $region
     */
    public function __construct($path, $signatureMethod, $extranet, $secretId, $secretKey, $region)
    {
        $this->path = $path;
        $this->signatureMethod = $signatureMethod;
        $this->extranet = $extranet;
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
        $this->region = $region;
    }
}