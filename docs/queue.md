## 队列相关接口

##### CreateQueue(...$args)

创建队列

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **maxMsgHeapNum** `int` 最大堆积消息数
- **pollingWaitSeconds** `int` 消息接收长轮询等待时间
- **visibilityTimeout** `int` 消息可见性超时
- **maxMsgSize** `int` 消息最大长度
- **msgRetentionSeconds** `int` 消息保留周期
- **rewindSeconds** `int` 队列是否开启回溯消息能力

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

##### ListQuery(...$args)

获取队列列表

- **searchWord** `string` 用于过滤队列列表，后台用模糊匹配的方式来返回符合条件的队列列表
- **offset** `int` 分页时本页获取队列列表的起始位置
- **limit** `int` 分页时本页获取队列的个数

```php
CMQ::Queue()->ListQuery();
```

##### GetQueueAttributes(...$args)

获取队列属性

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一

```php
CMQ::Queue()->GetQueueAttributes('test');
```

##### SetQueueAttributes(...$args)

修改队列属性

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **maxMsgHeapNum** `int` 最大堆积消息数
- **pollingWaitSeconds** `int` 消息接收长轮询等待时间
- **visibilityTimeout** `int` 消息可见性超时
- **maxMsgSize** `int` 消息最大长度
- **msgRetentionSeconds** `int` 消息保留周期
- **rewindSeconds** `int` 队列是否开启回溯消息能力

```php
CMQ::Queue()->SetQueueAttributes('test', 5000000);
```

##### DeleteQueue(...$args)

删除队列

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一

```php
CMQ::Queue()->DeleteQueue('test');
```

##### RewindQueue(...$args)

回溯队列

- **queueName** `string` 队列名字，在单个地域同一帐号下唯一
- **startConsumeTime** `int(unixtime)` 设定该时间，则（Batch）receiveMessage 接口，会按照生产消息的先后顺序消费该时间戳以后的消息

```php
// 需要在消息删除后执行
CMQ::Queue()->RewindQueue('test', time() - 1800);
```
