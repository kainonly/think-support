## 订阅相关接口

##### Subscribe(...$args)

创建订阅

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **subscriptionName** `string` 订阅名字，在单个地域同一帐号的同一主题下唯一
- **protocol** `string` 订阅的协议，目前支持两种协议：HTTP、Queue
- **endpoint** `string` 接收投递消息的 endpoint
- **notifyStrategy** `string` 向 endpoint 推送消息出现错误时，CMQ 推送服务器的重试策略。BACKOFF_RETRY，退避重试；EXPONENTIAL_DECAY_RETRY，指数衰退重试
- **notifyContentFormat** `string` 推送内容的格式。取值：（1）JSON。（2）SIMPLIFIED，即 raw 格式
- **filterTag** `array` 消息标签（用于消息过滤)
- **bindingKey** `array` 订阅接收消息的过滤策略

```php
CMQ::Topic()->Subscribe(
    'test-topic',
    'test',
    'queue',
    'normal',
    null,
    null,
    [
        'mytag'
    ]
);
```

##### ListSubscriptionByTopic(...$args)

获取订阅列表

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **searchWord** `string` 用于过滤订阅列表，后台用模糊匹配的方式来返回符合条件的订阅列表
- **offset** `int` 分页时本页获取订阅列表的起始位置
- **limit** `int` 分页时本页获取订阅的个数

```php
CMQ::Topic()->ListSubscriptionByTopic('test-topic');
```

##### SetSubscriptionAttributes(...$args)

修改订阅属性

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **subscriptionName** `string` 订阅名字，在单个地域同一帐号的同一主题下唯一
- **notifyStrategy** `string` 向 endpoint 推送消息出现错误时，CMQ 推送服务器的重试策略。BACKOFF_RETRY，退避重试；EXPONENTIAL_DECAY_RETRY，指数衰退重试
- **notifyContentFormat** `string` 推送内容的格式。取值：（1）JSON。（2）SIMPLIFIED，即 raw 格式
- **filterTag** `array` 消息标签（用于消息过滤)
- **bindingKey** `array` 订阅接收消息的过滤策略

```php
CMQ::Topic()->SetSubscriptionAttributes(
    'test-topic',
    'test',
    'BACKOFF_RETRY'
);
```

##### Unsubscribe(...$args)

删除订阅

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **subscriptionName** `string` 订阅名字，在单个地域同一帐号的同一主题下唯一

```php
CMQ::Topic()->Unsubscribe('test-topic', 'test');
```

##### GetSubscriptionAttributes(...$args)

获取订阅属性

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **subscriptionName** `string` 订阅名字，在单个地域同一帐号的同一主题下唯一

```php
CMQ::Topic()->GetSubscriptionAttributes('test-topic', 'test');
```

##### ClearSubscriptionFilterTags(...$args)

清空订阅标签

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **subscriptionName** `string` 订阅名字，在单个地域同一帐号的同一主题下唯一

```php
CMQ::Topic()->ClearSubscriptionFilterTags('test-topic', 'test');
```


