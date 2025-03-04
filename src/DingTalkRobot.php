<?php

namespace zhengqi\dingtalk\robot;

use zhengqi\dingtalk\robot\entity\AccessTokenEntity;
use zhengqi\dingtalk\robot\services\message\MessageSenderContainer;
use zhengqi\dingtalk\robot\services\ServiceContainer;
use zhengqi\dingtalk\robot\sign\AccessTokenService;

/**
 * 钉钉机器人
 * @method messageSender();
 */
class DingTalkRobot extends ServiceContainer
{
    protected array $services = [
        'messageSender' => MessageSenderContainer::class,
    ];

    public function __construct(object|array $config = [])
    {
        parent::__construct($config);
    }


    /**
     * 获取 access_token
     * 请自行缓存结果
     * 频繁请求会被限制
     * @return AccessTokenEntity
     * @throws \Exception
     */
    public function getAccessToken(): AccessTokenEntity
    {
        $accessTokenService = new AccessTokenService($this->config);
        return $accessTokenService->getAccessToken();
    }

}
