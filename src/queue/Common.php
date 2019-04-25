<?php

namespace cmq\sdk\queue;

use cmq\sdk\HttpClient;
use cmq\sdk\Signature;

abstract class Common
{
    /**
     * 具体操作的指令接口名称
     * @var string
     */
    public $Action;

    /**
     * 地域参数，用来标识希望操作哪个地域的实例。
     * @var string
     */
    public $Region;

    /**
     * 当前 UNIX 时间戳，可记录发起 API 请求的时间
     * @var int
     */
    public $Timestamp;

    /**
     * 随机正整数，与 Timestamp 联合起来， 用于防止重放攻击
     * @var int
     */
    public $Nonce;

    /**
     * 在 云API密钥 上申请的标识身份的 SecretId
     * @var string
     */
    public $SecretId;

    /**
     * 请求签名，用来验证此次请求的合法性，需要用户根据实际的输入参数计算得出
     * @var string
     */
    public $Signature;

    /**
     * 签名方式，目前支持 HmacSHA256 和 HmacSHA1
     * @var string
     */
    public $SignatureMethod;

    /**
     * 临时证书所用的 Token，需要结合临时密钥一起使用
     * @var string
     */
    public $Token;


    /**
     * Common constructor.
     */
    public function __construct()
    {
        $this->Region = config('cmq.default.region');
        $this->SecretId = config('cmq.secret_id');
        $this->SignatureMethod = config('cmq.signature_method');
    }

    /**
     * 生成参数
     * @return array
     */
    private function getArgs()
    {
        $args = array_filter(get_object_vars($this), function ($item) {
            return !empty($item);
        });
        ksort($args);
        return $args;
    }

    /**
     * 签名参数
     * @return string
     */
    private function getSignParams(HttpClient $httpClient)
    {
        $operates = [];
        foreach ($this->getArgs() as $k => $v) {
            array_push($operates, $k . '=' . $v);
        }
        $signRequest = $httpClient->getSignRequest();
        return $signRequest . '?' . join('&', $operates);
    }

    /**
     * 获取 POST 请求体
     * @param HttpClient $httpClient
     * @return mixed
     */
    public function result(HttpClient $httpClient)
    {
        $msg = null;
        $this->Nonce = rand(1, 65535);
        $this->Timestamp = time();
        $params = $this->getSignParams($httpClient);
        $this->Signature = Signature::factory($params);
        $response = $httpClient->Req($this->getArgs());
        $body = $response->getBody();
        while (!$body->eof()) $msg = $body->read(1024);
        return json_decode($msg, true);
    }
}