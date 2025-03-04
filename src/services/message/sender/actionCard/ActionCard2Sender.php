<?php

namespace zhengqi\dingtalk\robot\services\message\sender\actionCard;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCard2Entity;
use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCardBtnEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * ActionCard消息处理策略
 */
class ActionCard2Sender extends AbstractMessageSender implements IMessageSender
{
    private ActionCard2Entity $actionCard2Entity;

    private ActionCardBtnEntity $actionCardBtnEntity;

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

    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->actionCard2Entity = new ActionCard2Entity();
        $this->actionCardBtnEntity = new ActionCardBtnEntity();
    }

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
            $messageType => $this->actionCard2Entity
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
            $btns[] = $this->actionCardBtnEntity
                ->setTitle($messageBtn['title'])
                ->setActionURL($messageBtn['actionURL'])
                ->toArray();
        }
        return $btns;
    }

}
