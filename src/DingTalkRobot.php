<?php

namespace zhengqi\dingtalk\robot;

use HttpClient;
use zhengqi\dingtalk\robot\message\sender\MessageSender;
use zhengqi\dingtalk\robot\message\sender\feedCard\TextStrategy;

/**
 * 钉钉机器人
 */
class DingTalkRobot
{
    private array $config = [

    ];

    private MessageSender $messageSender;

    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
        $this->messageSender = new MessageSender();
    }

    public function send(array $messageData)
    {
        $this->messageSender->send($messageData);
    }


    public function sendMarkdown(array $message)
    {
        $data = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => 'title title',
                'text' => 'link text',
            ]
        ];


    }


    public function sendLink(array $message)
    {
        $data = [
            'msgtype' => 'link',
            'link' => [
                'title' => 'title title',
                'text' => 'link text',
                'picUrl' => 'picurl image url',
                'messageUrl' => 'message message url',
            ]
        ];
    }

    public function sendFeedCard(array $message)
    {
        $data = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => [
                    [
                        'title' => 'title title',
                        'messageURL' => 'message message url',
                        'picURL' => 'picurl image url',
                    ],
                    [
                        'title' => 'title title',
                        'messageURL' => 'message message url',
                        'picURL' => 'picurl image url',
                    ],
                ],
            ]
        ];
    }

    public function sendActionCard(array $message)
    {
        $data = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => 'title title',
                'text' => 'link text',
                'btnOrientation' => 'picurl image url',
                'singleTitle' => 'picurl image url',
                'singleURL' => 'message message url',
            ]
        ];
    }

    public function sendActionCard2(array $message)
    {
        $data = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => 'title title',
                'text' => 'link text',
                'btnOrientation' => 'picurl image url',
                'btns' => [
                    ['title' => '', 'actionURL' => ''],
                    ['title' => '', 'actionURL' => ''],
                ],
            ]
        ];
    }
}
