<?php

namespace zhengqi\dingtalk\robot\services;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\container\Container;

/**
 * 钉钉机器人 - 服务容器
 */
class ServiceContainer extends Container
{
    protected array $services = [];
    protected Config $config;

    public function __construct(object|array $config)
    {
        parent::__construct();
        $this->formatConfig($config);
        $this->registerServices();
    }

    public function registerServices(): self
    {
        foreach ($this->services as $name => $serviceInstance) {
            $this->register($name, $serviceInstance);
        }
        return $this;
    }

    /**
     * @param string $serviceName
     * @param string|object $serviceInstance
     * @return $this
     */
    public function register(string $serviceName, string|object $serviceInstance): self
    {
        $this->services[$serviceName] = new $serviceInstance($this->config);
        return $this;
    }

    /**
     * @param object|array $config
     */
    protected function formatConfig(object|array $config): void
    {
        if ($config instanceof Config) {
            $this->config = $config;
        } else if (is_array($config)) {
            $this->config = new Config();
            $this->config
                ->setAgentId($config["agent_id"])
                ->setAppKey($config["app_key"])
                ->setAppSecret($config["app_secret"])
                ->setAccessToken($config["access_token"])
                ->setSecret($config["secret"]);
        }
    }

}