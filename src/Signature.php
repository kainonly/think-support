<?php

namespace cmq\sdk;

final class Signature
{
    /**
     * 生成签名
     * @param string $instance
     * @param string $param 签名参数
     * @return string
     */
    public static function factory(Instance $instance, $param)
    {
        $method = null;
        switch ($instance->signatureMethod) {
            case 'HmacSHA1':
                $method = 'sha1';
                break;
            case 'HmacSHA256':
                $method = 'sha256';
                break;
        }
        return base64_encode(
            hash_hmac($method, $param, $instance->secretKey, true)
        );
    }
}