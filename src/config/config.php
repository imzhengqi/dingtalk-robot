<?php

namespace zhengqi\dingtalk\robot\config;

use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * 钉钉配置
 */
class Config
{
    use Singleton;

    private string $agentId = '';

    private string $appKey = '';

    private string $appSecret = '';

    private string $secret = '';

    private string $accessToken = '';

    private array $options = [
        'headers' => [
            'Content-Type' => 'application/json',
        ]
    ];

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
     * @return Config
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

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options = []): Config
    {
        $this->options = array_merge($this->options, $options);
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * 配置数组转对象
     * @param array|Config $config
     * @return Config
     */
    public function convert(array|Config $config): Config
    {
        if (is_array($config)) {
            $this->toObject($config);
        } else if ($config instanceof self) {
            return $config;
        }
        return $this;
    }

    /**
     * @param array $config
     * @return $this
     */
    public function toObject(array $config): Config
    {
        self::getInstance()->setAgentId($config["agent_id"])
            ->setAppKey($config["app_key"])
            ->setAppSecret($config["app_secret"])
            ->setAccessToken($config["access_token"])
            ->setSecret($config["secret"])
            ->setOptions($config["options"]);
        return $this;
    }

    /**
     * 转为数组输出
     * @return array
     */
    public function toArray(): array
    {
        return [
            'agent_id' => $this->agentId,
            'app_key' => $this->appKey,
            'app_secret' => $this->appSecret,
            'secret' => $this->secret,
            'access_token' => $this->accessToken,
            'options' => $this->options,
        ];
    }
}
