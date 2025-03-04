<?php

namespace zhengqi\dingtalk\robot\services\message\sender\markdown;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\message\sender\AtEntity;
use zhengqi\dingtalk\robot\entity\message\sender\MarkdownEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

/**
 * Markdown消息策略
 */
class MarkdownSender extends AbstractMessageSender implements IMessageSender
{
    private MarkdownEntity $markdownEntity;

    private AtEntity $atEntity;

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

    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->markdownEntity = new MarkdownEntity();
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
            $messageType => $this->markdownEntity
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->toArray(),
            'at' => $this->atEntity
                ->setAtMobiles($messageData['at']['atMobiles'])
                ->setAtUserIds($messageData['at']['atUserIds'])
                ->setIsAtAll($messageData['at']['isAtAll'])
                ->toArray(),
        ];
    }

}
