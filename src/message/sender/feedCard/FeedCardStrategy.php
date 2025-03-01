<?php

namespace zhengqi\dingtalk\robot\message\sender\feedCard;

use zhengqi\dingtalk\robot\message\sender\AbstractMessageStrategy;
use zhengqi\dingtalk\robot\message\sender\entity\feedCard\FeedCardEntity;
use zhengqi\dingtalk\robot\message\sender\entity\feedCard\FeedCardLinkEntity;
use zhengqi\dingtalk\robot\message\sender\MessageStrategy;

/**
 * FeedCard消息处理策略
 */
class FeedCardStrategy extends AbstractMessageStrategy implements MessageStrategy
{
    private FeedCardEntity $feedCardEntity;

    private FeedCardLinkEntity $feedCardLinkEntity;

    protected array $messageBody = [
        'msgtype' => 'feedCard',
        'feedCard' => [
            'links' => [
                [
                    'title' => '',
                    'messageURL' => '',
                    'picURL' => '',
                ],
            ],
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $this->feedCardEntity = new FeedCardEntity();
        $this->feedCardLinkEntity = new FeedCardLinkEntity();
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
            $messageType => $this->feedCardEntity
                ->setLinks(
                    $this->formatLinks($messageEntity['links'])
                )
                ->toArray(),
        ];
    }

    /**
     * @param array $messageLinks
     * @return array
     */
    private function formatLinks(array $messageLinks) : array
    {
        $links = [];
        foreach ($messageLinks as $messageLink) {
            $links[] = $this->feedCardLinkEntity
                ->setTitle($messageLink['title'])
                ->setMessageUrl($messageLink['messageURL'])
                ->setPicUrl($messageLink['picURL'])
                ->toArray();
        }
        return $links;
    }

}
