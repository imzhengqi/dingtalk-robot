<?php

namespace zhengqi\dingtalk\robot\message\sender;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\http\HttpResponse;

interface MessageStrategy
{
    public function config(Config $config): self;
    public function sendMessage(array $messageData): HttpResponse;
}