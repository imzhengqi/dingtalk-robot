## 钉钉官方文档
https://open.dingtalk.com/document/orgapp/robot-overview
## 安装
``
composer require zhengqi\dingtalk-robot
``

# 使用 与 扩展
## 1. 使用
```
<?php
use zhengqi\dingtalk\robot\DingTalkTobot;
use zhengqi\dingtalk\robot\config\Config;

// 实例化
$dingTalkRobot = new DingTalkTobot([
    'agent_id' => 'agent_id',
    'app_key' => 'app_key',
    'app_secret' => 'app_secret',
    'access_token' => 'access_token',
    'secret' => 'secret',
]);


// 发送 text 消息
$dingTalkRobot->messageSender()->text()->send([
    'msgtype' => 'text',
    'text' => [
        'content' => '我就是我, @user123 是不一样的烟火',
    ],
    'at' => [
        'atMobiles' => ['16800000000', '18800000000'],
        'atUserIds' => ['user123'],
        'isAtAll' => false,
    ],
]);

// 发送 markdown 消息
$dingTalkRobot->messageSender()->markdown()->send([
    'msgtype' => 'markdown',
    'markdown' => [
        'title' => '杭州天气',
        'text' => '#### 杭州天气 @150XXXXXXXX \n > 9度，西北风1级，空气良89，相对温度73%\n > ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n > ###### 10点20分发布 [天气](https://www.dingtalk.com) \n',
    ],
    'at' => [
        'atMobiles' => ['16800000000', '18800000000'],
        'atUserIds' => ['user123'],
        'isAtAll' => false,
    ],
]);

// 发送 link 消息
$dingTalkRobot->messageSender()->link()->send([
    'msgtype' => 'link',
    'link' => [
        'title' => '时代的火车向前开',
        'text' => '这个即将发布的新版本，创始人xx称它为红树林。',
        'picUrl' => 'https://img.alicdn.com/imgextra/i1/O1CN01SNHEw41ysQFPN5Ql6_!!6000000006634-55-tps-176-31.svg',
        'messageUrl' => 'https://open.dingtalk.com/document/orgapp/custom-bot-send-message-type',
    ],
]);

// 发送 feecCard 消息
$dingTalkRobot->messageSender()->feedCard()->send([
    'msgtype' => 'feedCard',
    'feedCard' => [
        'links' => [
            [
                'title' => '时代的火车继续向前开',
                'messageURL' => 'https://open.dingtalk.com/document/orgapp/custom-bot-send-message-type',
                'picURL' => 'https://img.alicdn.com/imgextra/i1/O1CN01SNHEw41ysQFPN5Ql6_!!6000000006634-55-tps-176-31.svg',
            ],
            [
                'title' => '时代的火车一直向前开',
                'messageURL' => 'https://open.dingtalk.com/document/orgapp/custom-bot-send-message-type',
                'picURL' => 'https://img.alicdn.com/imgextra/i1/O1CN01SNHEw41ysQFPN5Ql6_!!6000000006634-55-tps-176-31.svg',
            ],
        ],
    ],
]);

// 发送 actionCard 消息
$dingTalkRobot->messageSender()->actionCard()->send([
    'msgtype' => 'actionCard',
    'actionCard' => [
        'title' => '乔布斯说 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身',
        'text' => '![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划',
        'btnOrientation' => '', // 0 = 按钮竖直排列 , 1 = 按钮横向排列
        'singleTitle' => '阅读全文',
        'singleURL' => 'https://open.dingtalk.com/document/orgapp/custom-bot-send-message-type',
    ],
]);

// 发送 actionCard2 消息
$dingTalkRobot->messageSender()->actionCard2()->send([
    'msgtype' => 'actionCard',
    'actionCard' => [
        'title' => '我 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身',
        'text' => '![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划',
        'btnOrientation' => '', // 0 = 按钮竖直排列 , 1 = 按钮横向排列
        'btns' => [
            [
                'title' => '关注我',
                'actionURL' => 'https://www.guanzhuwo.com/',
            ],
            [
                'title' => '没兴趣',
                'actionURL' => 'https://www.meixingqu.com/',
            ],
        ],
    ],
]);


```

## 2. 扩展
如果官方推出了新的消息类型，我还没更新，你又着急用的话
```
<?php

use zhengqi\dingtalk\robot\DingTalkTobot;

// 继承 AbstractMessageSender 实现 IMessageSender接口
// 注册后发送
$dingTalkRobot->messageSender()
->register('testNewMsgType', TestNewMessageSender::class)
->testNewMsgType()
->send()
```
