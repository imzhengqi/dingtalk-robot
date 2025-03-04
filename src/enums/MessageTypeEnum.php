<?php

namespace zhengqi\dingtalk\robot\enums;

use zhengqi\dingtalk\robot\services\message\sender\actionCard\ActionCard2Sender;
use zhengqi\dingtalk\robot\services\message\sender\actionCard\ActionCardSender;
use zhengqi\dingtalk\robot\services\message\sender\feedCard\FeedCardSender;
use zhengqi\dingtalk\robot\services\message\sender\link\LinkSender;
use zhengqi\dingtalk\robot\services\message\sender\markdown\MarkdownSender;
use zhengqi\dingtalk\robot\services\message\sender\text\TextSender;

/**
 * 消息类型
 */
enum MessageTypeEnum: string
{
    case TEXT = TextSender::class;
    case LINK = LinkSender::class;
    case MARKDOWN = MarkdownSender::class;
    case FEED_CARD = FeedCardSender::class;
    case ACTION_CARD = ActionCardSender::class;
    case ACTION_CARD_2 = ActionCard2Sender::class;

    public static function handleServices()
    {

    }
}