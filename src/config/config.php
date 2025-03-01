<?php
namespace zhengqi\dingtalk\robot\config;

/**
 * 钉钉配置
 */
class Config
{
    private string $agentId = '';

    private string $appKey = '';

    private string $appSecret = '';

    private string $robotSendUrl = 'https://oapi.dingtalk.com/robot/send';


    /**
     * @param string $agentId
     */
    public function setAgentId(string $agentId): void
    {
        $this->agentId = $agentId;
    }

    /**
     * @param string $appKey
     */
    public function setAppKey(string $appKey): void
    {
        $this->appKey = $appKey;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret(string $appSecret): void
    {
        $this->appSecret = $appSecret;
    }

    /**
     * @param string $robotSendUrl
     */
    public function setRobotSendUrl(string $robotSendUrl): void
    {
        $this->robotSendUrl = $robotSendUrl;
    }

    public function toArray(): array
    {
        return [
            'agentId' => $this->agentId,
            'appKey' => $this->appKey,
            'appSecret' => $this->appSecret,
            'robotSendUrl' => $this->robotSendUrl,
        ];
    }
}

//return [
//    'agent_id' => '31244001',
//    'app_key' => 'dingcjc63iitbqjfmfqs',
//    'app_secret' => 'BzSiXO4XcTHcnQb-aa9WpNRK57UCerof5ZB3CmYa7Q7qxITXf5_erIZ2gg_tNxUC',
//    'robot_send_url' => 'https://oapi.dingtalk.com/robot/send',
//];
