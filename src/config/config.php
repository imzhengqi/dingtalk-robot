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

    private string $secret = '';

    private string $accessToken = '';

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

    /**
     * @param string $secret
     * @return Config
     */
    public function setSecret(string $secret): Config
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): Config
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function toArray(): array
    {
        return [
            'agent_id' => $this->agentId,
            'app_key' => $this->appKey,
            'app_secret' => $this->appSecret,
            'secret' => $this->secret,
            'access_token' => $this->accessToken,
        ];
    }
}
