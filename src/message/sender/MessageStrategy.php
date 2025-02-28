<?php

namespace zhengqi\dingtalk\robot\message;

interface MessageStrategy
{
    public function sendMessage(array $messageData): array;
}