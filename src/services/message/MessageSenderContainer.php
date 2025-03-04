<?php

namespace zhengqi\dingtalk\robot\services\message;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\services\message\sender\actionCard\ActionCard2Sender;
use zhengqi\dingtalk\robot\services\message\sender\actionCard\ActionCardSender;
use zhengqi\dingtalk\robot\services\message\sender\feedCard\FeedCardSender;
use zhengqi\dingtalk\robot\services\message\sender\link\LinkSender;
use zhengqi\dingtalk\robot\services\message\sender\markdown\MarkdownSender;
use zhengqi\dingtalk\robot\services\message\sender\text\TextSender;
use zhengqi\dingtalk\robot\services\ServiceContainer;

/**
 * 消息发送服务
 * 1. 自动注册服务
 * 2.
 */
class MessageSenderContainer extends ServiceContainer
{
    protected Config $config;

    protected array $services = [
        'text' => TextSender::class,
        'link' => LinkSender::class,
        'markdown' => MarkdownSender::class,
        'feedCard' => FeedCardSender::class,
        'actionCard' => ActionCardSender::class,
        'actionCard2' => ActionCard2Sender::class,
    ];
}