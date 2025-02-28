<?php

namespace zhengqi\dingtalk\robot\message;

use zhengqi\dingtalk\robot\enum\MessageTypeEnum;

class MessageSender
{
    private MessageStrategy $strategy;

    private function getStrategyByMessageType(string $messageType): MessageStrategy
    {
        return null;
    }

    /**
     * 发送消息
     * @param array $data
     * @return void
     */
    public function send(array $data): array
    {
        // 验证消息类型
        if (!MessageTypeEnum::isExisted($data['msgtype'])) {
            return [];
        }
        // 根据消息类型找到策略，并发送消息
        return $this->getStrategyByMessageType($data['msgtype'])->sendMessage($data);
    }
}
