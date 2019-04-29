## 主题相关接口

##### CreateTopic(...$args)

创建主题

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **maxMsgSize** `int` 消息最大长度
- **filterType** `int` 用于指定主题的消息匹配策略，filterType =1 或为空， 表示该主题下所有订阅使用 filterTag 标签过滤，filterType =2 表示用户使用 bindingKey 过滤

##### SetTopicAttributes(...$args)

修改主题属性

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一
- **maxMsgSize** `int` 消息最大长度

##### ListTopic(...$args)

获取主题列表

- **searchWord** `string` 用于过滤主题列表，后台用模糊匹配的方式来返回符合条件的主题列表
- **offset** `int` 分页时本页获取主题列表的起始位置
- **limit** `int` 分页时本页获取主题的个数

##### GetTopicAttributes(...$args)

获取主题属性

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一

##### DeleteTopic(...$args)

删除主题

- **topicName** `string` 主题名字，在单个地域同一帐号下唯一

