<?php

namespace zhengqi\dingtalk\robot\services;

use Exception;
use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\container\Container;

/**
 * 钉钉机器人 - 服务容器
 */
class ServiceContainer extends Container
{
    /**
     * @var array 待注册服务
     */
    protected array $registerServices = [];

    /**
     * @var Config 钉钉相关配置
     */
    protected Config $config;

    /**
     * @param object|array $config
     * @throws Exception
     */
    public function __construct(object|array $config)
    {
        parent::__construct();
        $this->convertConfig($config);
        $this->registerServices();
    }

    /**
     * @return $this 批量注册服务
     */
    public function registerServices(): self
    {
        foreach ($this->registerServices as $serviceName => $handlerService) {
            $this->register($serviceName, $handlerService);
        }
        return $this;
    }

    /**
     * @override 重写注册方法
     *
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
     * 如果是数组，转换成对象
     * @param object|array $config
     */
    private function convertConfig(object|array $config): void
    {
        $this->config = Config::getInstance()->convert($config);
    }

}