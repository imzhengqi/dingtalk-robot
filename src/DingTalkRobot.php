<?php

namespace zhengqi\dingtalk\robot;

use zhengqi\dingtalk\robot\services\message\MessageSenderService;
use zhengqi\dingtalk\robot\services\ServiceContainer;
use zhengqi\dingtalk\robot\services\sign\AccessTokenService;
use zhengqi\dingtalk\robot\services\sign\SignService;

/**
 * 钉钉机器人
 * @method sign();
 * @method accessToken();
 * @method messageSender();
 */
class DingTalkRobot extends ServiceContainer
{
    protected array $registerServices = [
        'sign' => SignService::class,
        'accessToken' => AccessTokenService::class,
        'messageSender' => MessageSenderService::class,
    ];
}
