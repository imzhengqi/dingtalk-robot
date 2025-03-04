<?php

namespace zhengqi\dingtalk\robot\services\message\sender\link;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\message\sender\LinkEntity;
use zhengqi\dingtalk\robot\services\message\sender\AbstractMessageSender;
use zhengqi\dingtalk\robot\services\message\sender\IMessageSender;

class LinkSender extends AbstractMessageSender implements IMessageSender
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

    public function __construct(Config $config)
    {
        parent::__construct($config);
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
