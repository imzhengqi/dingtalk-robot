<?php

namespace zhengqi\dingtalk\robot\message\sender\actionCard;

use zhengqi\dingtalk\robot\message\sender\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\sender\entity\actionCard\ActionCardEntity;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;

/**
 * ActionCard消息处理策略
 */
class ActionCardStrategy extends AbstractMessageStrategy implements MessageStrategy
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

    public function __construct()
    {
        parent::__construct();
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
