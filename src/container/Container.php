<?php

namespace zhengqi\dingtalk\robot\container;

use Exception;

/**
 * 服务注册容器
 */
class Container
{
    /**
     * @var array 服务列表
     */
    protected array $services = [];

    public function __construct()
    {
    }

    /**
     * @param string $serviceName
     * @param string|object $serviceInstance
     * @return $this
     */
    public function register(string $serviceName, string|object $serviceInstance): self
    {
        $this->services[$serviceName] = is_string($serviceInstance) ? new $serviceInstance() : $serviceInstance;
        return $this;
    }

    /**
     * 获取服务
     * @param string $serviceName
     * @return object
     * @throws \Exception
     */
    public function getService(string $serviceName): object
    {
        if (!isset($this->services[$serviceName])) {
            throw new \Exception("Service '$serviceName' not found.");
        }
        return $this->services[$serviceName];
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param string $name
     * @param mixed $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call(string $name, mixed $arguments)
    {
        if (isset($this->services[$name])) {
            $service = $this->services[$name];
            // 如果服务是一个可调用对象（如闭包或实现了 __invoke 的类），直接调用它
            if (is_callable($service)) {
                return call_user_func_array($service, $arguments);
            }
            // 否则，返回服务实例
            return $service;
        }
        throw new Exception("Method '{$name}' not found.");
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function __get(string $name)
    {
        if (isset($this->services[$name])) {
            return $this->services[$name];
        }
        throw new Exception("Method '{$name}' not found.");
    }
}
