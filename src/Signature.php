<?php

namespace cmq\sdk;

final class Signature
{
    /**
     * 签名密钥
     * @var mixed
     */
    private $key;

    /**
     * 加密类型
     * @var string
     */
    private $method;

    /**
     * 生成签名
     * @param string $param 签名参数
     * @return string
     */
    public static function factory($param)
    {
        $signature = new Signature();
        return $signature->create($param);
    }

    public function __construct()
    {
        $this->key = config('cmq.secret_key');
        switch (config('cmq.signature_method')) {
            case 'HmacSHA1':
                $this->method = 'sha1';
                break;
            case 'HmacSHA256':
                $this->method = 'sha256';
                break;
        }
    }

    /**
     * 创建签名
     * @param string $param 签名参数
     * @return string
     */
    private function create($param)
    {
        return base64_encode(hash_hmac($this->method, $param, $this->key, true));
    }
}