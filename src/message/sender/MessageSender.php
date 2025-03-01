<?php

namespace zhengqi\dingtalk\robot\message\sender;

use zhengqi\dingtalk\robot\message\enum\MessageTypeEnum;
use zhengqi\exception\InvalidArgumentException;

class MessageSender
{
    private string $messageType;

    private MessageStrategy $strategy;

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
     * @return MessageStrategy
     */
    private function getStrategyByMessageType(): MessageStrategy
    {
        // 验证消息类型
        if (!MessageTypeEnum::isExisted($this->messageType)) {
            throw new InvalidArgumentException("invalid argument: msgtype.");
        }

        // 找到对应的消息处理策略
        return MessageTypeEnum::handlerByType($this->messageType);
    }

    /**
     * 发送消息
     * @param array $messageData
     * @return array
     */
    public function send(array $messageData): array
    {
        // 当前消息类型
        $this->setMessageType($messageData['msgtype']);

        // 根据消息类型找到策略
        $this->setStrategy($this->getStrategyByMessageType());

        // 发送消息
        return $this->strategy->sendMessage($messageData);
    }
}
