<?php

namespace zhengqi\dingtalk\robot\services\message\sender\actionCard;

use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCardEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * ActionCard消息处理策略
 */
class ActionCardSender extends AbstractMessageSender implements IMessageSender
{
    protected array $messageBody = [
        'msgtype' => 'actionCard',
        'actionCard' => [
            'title' => '',
            'text' => '',
            'btnOrientation' => '',
            'singleTitle' => '',
            'singleURL' => '',
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
            $messageType => ActionCardEntity::getInstance()
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->setBtnOrientation($messageEntity['btnOrientation'])
                ->setSingleTitle($messageEntity['singleTitle'])
                ->setSingleURL($messageEntity['singleURL'])
                ->toArray(),
        ];
    }

}
