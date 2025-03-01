<?php

namespace zhengqi\dingtalk\robot\message\sender;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\http\HttpResponse;
use zhengqi\dingtalk\robot\message\enum\MessageTypeEnum;
use zhengqi\dingtalk\robot\exception\InvalidArgumentException;

class MessageSender
{
    private string $messageType;

    private MessageStrategy $strategy;

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $messageType
     */
    public function setMessageType(string $messageType): void
    {
        $this->messageType = $messageType;
    }

    /**
     * @param MessageStrategy $strategy
     */
    public function setStrategy(MessageStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * 找到对应的消息处理策略
     * @return MessageStrategy
     */
    private function getStrategyByMessageType(): MessageStrategy
    {
        $strategy = MessageTypeEnum::handlerByType($this->messageType);
        if ($strategy === null) {
            throw new InvalidArgumentException("invalid argument: msgtype.");
        }
        return $strategy;
    }

    /**
     * 发送消息
     * @param array $messageData
     * @return HttpResponse
     */
    public function send(array $messageData): HttpResponse
    {
        // 当前消息类型
        $this->setMessageType($messageData['msgtype']);

        // 根据消息类型找到策略
        $this->setStrategy($this->getStrategyByMessageType());

        // 发送消息
        return $this->strategy->config($this->config)->sendMessage($messageData);
    }
}
