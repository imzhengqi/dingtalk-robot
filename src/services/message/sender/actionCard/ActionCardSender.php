<?php

namespace zhengqi\dingtalk\robot\services\message\sender\actionCard;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\message\sender\actionCard\ActionCardEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * ActionCard消息处理策略
 */
class ActionCardSender extends AbstractMessageSender implements IMessageSender
{
    private ActionCardEntity $actionCardEntity;

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

    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->actionCardEntity = new ActionCardEntity();
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
            $messageType => $this->actionCardEntity
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->setBtnOrientation($messageEntity['btnOrientation'])
                ->setSingleTitle($messageEntity['singleTitle'])
                ->setSingleURL($messageEntity['singleURL'])
                ->toArray(),
        ];
    }

}
