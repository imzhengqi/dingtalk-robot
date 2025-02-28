<?php

namespace zhengqi\dingtalk\robot\message\text;

use zhengqi\dingtalk\robot\message\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\entity\AtEntity;
use zhengqi\dingtalk\robot\message\entity\TextEntity;
use zhengqi\dingtalk\robot\message\MessageStrategy;

class TextStrategy extends AbstractMessageStrategy implements MessageStrategy
{
    private TextEntity $textEntity;

    private AtEntity $atEntity;

    private array $messageBody = [
        'msgtype' => 'text',
        'text' => [
            'content' => 'message content',
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

    public function sendMessage(array $messageData): array
    {
        $this->messageBody = [
            'msgtype' => $messageData['msgtype'],
            'text' => $this->textEntity->setContent($messageData['text']['content'])->toArray(),
            'at' => $this->atEntity
                ->setAtMobiles($messageData['at']['atMobiles'])
                ->setAtUserIds($messageData['at']['atUserIds'])
                ->setIsAtAll($messageData['at']['isAtAll'])
                ->toArray(),
        ];

        return $this->httpClient->post('', $this->messageBody);
    }
}
