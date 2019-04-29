## 消息相关接口

##### SendMessage(...$args)

发送消息 

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **msgBody** `string|array` 消息正文，数组时会自动转为json字符串
- **delaySeconds** `int` 需要延时多久用户才可见该消息

```php
CMQ::Queue()->SendMessage('test', [
    'name' => 'kain'
]);
```

##### BatchSendMessage(...$args)

批量发送消息

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **msgBody** `array` 消息正文
- **delaySeconds** `int` 需要延时多久用户才可见该消息

```php
CMQ::Queue()->BatchSendMessage('test', [
    ['type' => '1'],
    ['type' => '2']
]);
```

##### ReceiveMessage(...$args)

消费消息

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **pollingWaitSeconds** `int` 本次请求的长轮询等待时间

```php
CMQ::Queue()->ReceiveMessage('test');
```

##### BatchReceiveMessage(...$args)

批量消费消息

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **numOfMsg** `int` 本次消费的消息数量，取值范围 1 - 16
- **pollingWaitSeconds** `int` 本次请求的长轮询等待时间

```php
CMQ::Queue()->BatchReceiveMessage('test', 16);
```

##### DeleteMessage(...$args) 

删除消息

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **receiptHandle** `string` 上次消费返回唯一的消息句柄，用于删除消息

```php
$res = CMQ::Queue()->ReceiveMessage('test');
if ($res['code'] == 0) {
    CMQ::Queue()->DeleteMessage('test', $res['receiptHandle']);
}
```

##### BatchDeleteMessage(...$args)

批量删除消息

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **receiptHandle** `array` 上次消费返回唯一的消息句柄，用于删除消息

```php
$res = CMQ::Queue()->BatchReceiveMessage('test', 16);
if ($res['code'] == 0) {
    $receiptHandle = array_map(function ($item) {
        return $item['receiptHandle'];
    }, $res['msgInfoList']);

    CMQ::Queue()->BatchDeleteMessage('test', $receiptHandle);
}
```

