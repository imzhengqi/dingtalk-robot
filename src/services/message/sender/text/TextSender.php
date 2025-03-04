<?php

namespace zhengqi\dingtalk\robot\services\message\sender\text;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\message\sender\AtEntity;
use zhengqi\dingtalk\robot\entity\message\sender\TextEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * 文本消息策略
 * @Service('textSenderService')
 */
class TextSender extends AbstractMessageSender implements IMessageSender
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

    public function __construct(Config $config)
    {
        parent::__construct($config);
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
