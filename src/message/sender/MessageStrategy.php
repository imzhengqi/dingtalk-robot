<?php

namespace zhengqi\dingtalk\robot\message\sender;

interface MessageStrategy
{
    public function sendMessage(array $messageData): array;
}