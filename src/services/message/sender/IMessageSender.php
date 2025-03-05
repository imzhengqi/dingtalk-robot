<?php

namespace zhengqi\dingtalk\robot\services\message\sender;

use zhengqi\dingtalk\robot\entity\http\HttpResponse;

/**
 * 消息发送接口
 */
interface IMessageSender
{
    public function send(array $messageData): HttpResponse;
}