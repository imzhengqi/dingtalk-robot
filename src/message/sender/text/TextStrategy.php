<?php

namespace zhengqi\dingtalk\robot\message\sender\text;

use zhengqi\dingtalk\robot\message\sender\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\sender\entity\AtEntity;
use zhengqi\dingtalk\robot\message\sender\entity\TextEntity;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;

/**
 * 文本消息策略
 */
class TextStrategy extends AbstractMessageStrategy implements MessageStrategy
{
    private TextEntity $textEntity;

    private AtEntity $atEntity;

    protected array $messageBody = [
        'msgtype' => 'text',
        'text' => [
            'content' => '',
        ],
        'at' => [
            'atMobiles' => [],
            'atUserIds' => [],
            'isAtAll' => false,
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $this->textEntity = new TextEntity();
        $this->atEntity = new AtEntity();
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
            $messageType => $this->textEntity
                ->setContent($messageEntity['content'])
                ->toArray(),
            'at' => $this->atEntity
                ->setAtMobiles($messageData['at']['atMobiles'])
                ->setAtUserIds($messageData['at']['atUserIds'])
                ->setIsAtAll($messageData['at']['isAtAll'])
                ->toArray(),
        ];
    }

}
