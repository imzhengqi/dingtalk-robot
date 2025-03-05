<?php

namespace zhengqi\dingtalk\robot\services\message\sender\actionCard;

use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCard2Entity;
use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCardBtnEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * ActionCard消息处理策略
 */
class ActionCard2Sender extends AbstractMessageSender implements IMessageSender
{
    protected array $messageBody = [
        'msgtype' => 'actionCard',
        'actionCard' => [
            'title' => '',
            'text' => '',
            'btnOrientation' => '',
            'btns' => [
                [
                    'title' => '',
                    'actionURL' => '',
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
            $messageType => ActionCard2Entity::getInstance()
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->setBtnOrientation($messageEntity['btnOrientation'])
                ->setBtns(
                    $this->formatBtns($messageEntity['btns'])
                )
                ->toArray(),
        ];
    }

    /**
     * @param array $messageBtns
     * @return array
     */
    private function formatBtns(array $messageBtns): array
    {
        $btns = [];
        foreach ($messageBtns as $messageBtn) {
            $btns[] = ActionCardBtnEntity::getInstance()
                ->setTitle($messageBtn['title'])
                ->setActionURL($messageBtn['actionURL'])
                ->toArray();
        }
        return $btns;
    }

}
