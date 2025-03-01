<?php

namespace zhengqi\dingtalk\robot;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\message\sender\feedCard\TextStrategy;
use zhengqi\dingtalk\robot\message\sender\MessageSender;
use zhengqi\dingtalk\robot\sign\AccessTokenService;

/**
 * 钉钉机器人
 */
class DingTalkRobot
{
    private Config $config;

    public function __construct(array $config = [])
    {
        var_dump('---> config data ' . PHP_EOL);
        var_dump($config);
        $this->formatConfig($config);
    }

    /**
     * @param array $config
     */
    private function formatConfig(array $config): void
    {
        $this->config = new Config();
        $this->config
            ->setAgentId($config["agent_id"])
            ->setAppKey($config["app_key"])
            ->setAppSecret($config["app_secret"]);
    }

    /**
     * 发送机器人消息
     * @param array $messageData
     * @return array
     */
    public function send(array $messageData): array
    {
        $messageSender = new MessageSender();
        return $messageSender->send($messageData);
    }

    /**
     * 获取 access_token
     * 请自行缓存结果
     * 频繁请求会被限制
     * @return array ['accessToken' => 'fw8ef8we8f76e6f7s8dxxxx', '' => 7200]
     * @throws \Exception
     */
    public function getAccessToken(): array
    {
        var_dump('--- start getAccessToken ---' . PHP_EOL);
        $accessTokenService = new AccessTokenService($this->config);
        return $accessTokenService->getAccessToken();
    }

}
