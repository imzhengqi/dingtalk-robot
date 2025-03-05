<?php

namespace zhengqi\dingtalk\robot\services\message\sender\feedCard;

use zhengqi\dingtalk\robot\entity\message\sender\feedCard\FeedCardEntity;
use zhengqi\dingtalk\robot\entity\message\sender\feedCard\FeedCardLinkEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * FeedCard消息处理策略
 */
class FeedCardSender extends AbstractMessageSender implements IMessageSender
{
    protected array $messageBody = [
        'msgtype' => 'feedCard',
        'feedCard' => [
            'links' => [
                [
                    'title' => '',
                    'messageURL' => '',
                    'picURL' => '',
                ],
            ],
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
            $messageType => FeedCardEntity::getInstance()
                ->setLinks(
                    $this->formatLinks($messageEntity['links'])
                )
                ->toArray(),
        ];
    }

    /**
     * @param array $messageLinks
     * @return array
     */
    private function formatLinks(array $messageLinks): array
    {
        $links = [];
        foreach ($messageLinks as $messageLink) {
            $links[] = FeedCardLinkEntity::getInstance()
                ->setTitle($messageLink['title'])
                ->setMessageUrl($messageLink['messageURL'])
                ->setPicUrl($messageLink['picURL'])
                ->toArray();
        }
        return $links;
    }

}
