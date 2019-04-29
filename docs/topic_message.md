## 消息相关接口

##### PublishMessage(...$args)

发布消息

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **msgBody** `string|array` 消息正文，数组时会自动转为json字符串
- **msgTag** `array` 消息过滤标签
- **routingKey** `string` 表示发送消息的路由路径

```php
CMQ::Topic()->Subscribe(
    'test-topic',
    'test-without-tag',
    'queue',
    'test-normal'
);
```

##### BatchPublishMessage(...$args)

批量发布消息

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **msgBody** `array` 消息正文
- **msgTag** `array` 消息过滤标签
- **routingKey** `string` 表示发送消息的路由路径

```php
CMQ::Topic()->BatchPublishMessage('test-topic', [
    ['type' => '1'],
    ['type' => '2']
], [
    'mytag'
]);
```
