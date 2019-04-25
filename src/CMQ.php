<?php

namespace cmq\sdk;


final class CMQ
{
    /**
     * 创建队列客户端
     * @param string $instance 预设名
     * @return Queue
     */
    public static function Queue($instance = 'default')
    {
        return new Queue(new Instance(
            config('cmq.path'),
            config('cmq.signature_method'),
            config('cmq.' . $instance . '.extranet'),
            config('cmq.' . $instance . '.secret_id'),
            config('cmq.' . $instance . '.secret_key'),
            config('cmq.' . $instance . '.region')
        ));
    }

    /**
     * 创建自定义队列客户端
     * @param string $path 请求固定路径
     * @param string $signature_method 加密方式
     * @param boolean $extranet 是否为外网
     * @param string $secret_id SecretId
     * @param string $secret_key SecretKey
     * @param string $region 地区
     * @return Queue
     */
    public static function NewQueue($path, $signature_method, $extranet, $secret_id, $secret_key, $region)
    {
        return new Queue(new Instance(
            $path,
            $signature_method,
            $extranet,
            $secret_id,
            $secret_key,
            $region
        ));
    }

    /**
     * 创建主题客户端
     * @param string $instance
     * @return Topic
     */
    public static function Topic($instance = 'default')
    {
        return new Topic(new Instance(
            config('cmq.path'),
            config('cmq.signature_method'),
            config('cmq.' . $instance . '.extranet'),
            config('cmq.' . $instance . '.secret_id'),
            config('cmq.' . $instance . '.secret_key'),
            config('cmq.' . $instance . '.region')
        ));
    }

    /**
     * 创建自定义主题客户端
     * @param string $path 请求固定路径
     * @param string $signature_method 加密方式
     * @param boolean $extranet 是否为外网
     * @param string $secret_id SecretId
     * @param string $secret_key SecretKey
     * @param string $region 地区
     * @return Topic
     */
    public static function NewTopic($path, $signature_method, $extranet, $secret_id, $secret_key, $region)
    {
        return new Topic(new Instance(
            $path,
            $signature_method,
            $extranet,
            $secret_id,
            $secret_key,
            $region
        ));
    }
}