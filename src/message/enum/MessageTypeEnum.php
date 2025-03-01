<?php

namespace zhengqi\dingtalk\robot\message\enum;

use zhengqi\dingtalk\robot\message\sender\actionCard\ActionCard2Strategy;
use zhengqi\dingtalk\robot\message\sender\actionCard\ActionCardStrategy;
use zhengqi\dingtalk\robot\message\sender\feedCard\FeedCardStrategy;
use zhengqi\dingtalk\robot\message\sender\link\LinkStrategy;
use zhengqi\dingtalk\robot\message\sender\markdown\MarkdownStrategy;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;
use zhengqi\dingtalk\robot\message\sender\text\TextStrategy;

/**
 * 消息类型
 */
final class MessageTypeEnum extends AbstractEnum
{
    const TEXT = [
        'type' => 'text',
        'handler' => TextStrategy::class,
    ];
    const LINK = [
        'type' => 'link',
        'handler' => LinkStrategy::class,
    ];
    const MARKDOWN = [
        'type' => 'markdown',
        'handler' => MarkdownStrategy::class,
    ];
    const ACTION_CARD = [
        'type' => 'actionCard',
        'handler' => ActionCardStrategy::class,
    ];
    const ACTION_CARD_2 = [
        'type' => 'actionCard',
        'handler' => ActionCard2Strategy::class,
    ];
    const FEED_CARD = [
        'type' => 'feedCard',
        'handler' => FeedCardStrategy::class,
    ];

    /**
     * 消息类型 => 消息处理类
     * @return array
     */
    private static function handlerList(): array
    {
        $enumList = self::getClassConstants();

        $handlerList = [];
        foreach ($enumList as $enum) {
            $handlerList[$enum['type']] = $enum['handler'];
        }

        return $handlerList;
    }

    /**
     * @param string $messageType
     * @return MessageStrategy
     */
    public static function handlerByType(string $messageType): MessageStrategy
    {
        $classname = self::handlerList()[$messageType];
        return new $classname();
    }


}