<?php

namespace zhengqi\dingtalk\robot\message\sender\link;

use zhengqi\dingtalk\robot\message\sender\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\sender\entity\LinkEntity;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;

class LinkStrategy extends AbstractMessageStrategy implements MessageStrategy
{
    private LinkEntity $linkEntity;

    protected array $messageBody = [
        'msgtype' => 'link',
        'link' => [
            'title' => '',
            'text' => '',
            'picUrl' => '',
            'messageUrl' => '',
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $this->linkEntity = new LinkEntity();
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
            $messageType => $this->linkEntity
                ->setTitle($messageEntity['title'])
                ->setText($messageEntity['text'])
                ->setPicUrl($messageEntity['picUrl'])
                ->setMessageUrl($messageEntity['messageUrl'])
                ->toArray(),
        ];
    }

}
