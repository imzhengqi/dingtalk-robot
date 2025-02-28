<?php
namespace zhengqi\dingtalk\robot\config;

class Config
{
    private string $agentId = '';

    private string $appKey = '';

    private string $appSecret = '';

    private string $domain = '';


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

    public function toArray(): array
    {
        return [
            'agentId' => $this->agentId,
            'appKey' => $this->appKey,
            'appSecret' => $this->appSecret,
        ];
    }
}

return [
    'agent_id' => '31244001',
    'app_key' => 'dingcjc63iitbqjfmfqs',
    'app_secret' => 'BzSiXO4XcTHcnQb-aa9WpNRK57UCerof5ZB3CmYa7Q7qxITXf5_erIZ2gg_tNxUC',
];
