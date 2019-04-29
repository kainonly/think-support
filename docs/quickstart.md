## 快速开始

##### 安装

```shell
composer require kain/cmq-sdk
```

> Lumen 请手动添加 `$app->configure('cmq')` 至 `bootstrap/app.php`

##### 配置文件

默认设置在 `config/cmq.php`

```php
return [

    'path' => '/v2/index.php',
    'signature_method' => 'HmacSHA256',

    'default' => [

        'extranet' => true,
        'secret_id' => '<your secretId>',
        'secret_key' => '<your secretKey>',
        'region' => 'gz'
        
    ]

    'special' => [

        'extranet' => false,
        'secret_id' => '<your secretId>',
        'secret_key' => '<your secretKey>',
        'region' => 'gz'
        
    ]

];
```

- **path** `string` 云 API 的请求固定路径，当前固定为 `/v2/index.php`
- **signature_method** `string` 加密方式，目前支持 `HmacSHA256` 和 `HmacSHA1`
- **default** `array` 默认配置
  - **extranet** `boolean` 是否为公网，用来决定请求地址
  - **secret_id** `string`  云API密钥 SecretId
  - **secret_key** `string`  云API密钥 SecretKey
  - **region** `string` 地域参数

> gz（广州），sh（上海），bj（北京），shjr（上海金融），szjr（深圳金融），hk（香港），cd（成都），ca(北美)，usw（美西），sg（新加坡）

##### 使用简介

配置好后即可操作使用，例如：创建一个 `test` 队列

```php
CMQ::Queue()->CreateQueue('test',
    1000000,
    null,
    null,
    null,
    null,
    60
);
```

你可以依照 `default` 配置多个需要操作的 CMQ，例如：使用 `special` 创建 `test` 队列

```php
CMQ::Queue('special')->CreateQueue('test',
    1000000,
    null,
    null,
    null,
    null,
    60
);
```