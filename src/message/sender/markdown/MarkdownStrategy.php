<?php

namespace zhengqi\dingtalk\robot\message\sender\markdown;

use zhengqi\dingtalk\robot\message\sender\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\sender\entity\AtEntity;
use zhengqi\dingtalk\robot\message\sender\entity\MarkdownEntity;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;

/**
 * Markdown消息策略
 */
class MarkdownStrategy extends AbstractMessageStrategy implements MessageStrategy
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

    public function __construct()
    {
        parent::__construct();
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
