<?php

namespace zhengqi\dingtalk\robot\services\message\sender\markdown;

use zhengqi\dingtalk\robot\entity\message\sender\AtEntity;
use zhengqi\dingtalk\robot\entity\message\sender\MarkdownEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * Markdown消息策略
 */
class MarkdownSender extends AbstractMessageSender implements IMessageSender
{
    protected array $messageBody = [
        'msgtype' => 'markdown',
        'markdown' => [
            'title' => '',
            'text' => '',
        ],
        'at' => [
            'atMobiles' => [],
            'atUserIds' => [],
            'isAtAll' => false,
        ],
    ];

    /**
     * 格式化消息实体
     * @param array $messageData
     * @return array
     */
    protected function formatMessageBody(array $messageData): array
    {
        $messageType = $messageData['msgtype'];
        $messageEntity = $messageData[$messageType];

        return [
            'msgtype' => $messageType,
            $messageType => MarkdownEntity::getInstance()
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->toArray(),
            'at' => AtEntity::getInstance()
                ->setAtMobiles($messageData['at']['atMobiles'])
                ->setAtUserIds($messageData['at']['atUserIds'])
                ->setIsAtAll($messageData['at']['isAtAll'])
                ->toArray(),
        ];
    }

}
