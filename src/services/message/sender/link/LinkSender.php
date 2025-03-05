<?php

namespace zhengqi\dingtalk\robot\services\message\sender\link;

use zhengqi\dingtalk\robot\entity\message\sender\LinkEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

class LinkSender extends AbstractMessageSender implements IMessageSender
{
    protected array $messageBody = [
        'msgtype' => 'link',
        'link' => [
            'title' => '',
            'text' => '',
            'picUrl' => '',
            'messageUrl' => '',
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
            $messageType => LinkEntity::getInstance()
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->setPicUrl($messageEntity['picUrl'])
                ->setMessageUrl($messageEntity['messageUrl'])
                ->toArray(),
        ];
    }

}
