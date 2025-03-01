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

    /**
     * @param string $agentId
     * @return Config
     */
    public function setAgentId(string $agentId): Config
    {
        $this->agentId = $agentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgentId(): string
    {
        return $this->agentId;
    }

    /**
     * @param string $appKey
     * @return Config
     */
    public function setAppKey(string $appKey): Config
    {
        $this->appKey = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }

    /**
     * @param string $appSecret
     * @return Config
     */
    public function setAppSecret(string $appSecret): Config
    {
        $this->appSecret = $appSecret;
        return $this;
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
